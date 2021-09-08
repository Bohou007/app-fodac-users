<?php

namespace App\Http\Controllers;

use App\Mail\AgentRegisterMail;
use App\Mail\CompteCreatedMail;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.compte_users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $roles = Role::where('name', '!=', 'Super Admin')->get();
            return view('admin.compte_users.create', compact('roles'));
        }else {
            return back();
        }
    }

    public function genererChaine($longueur, $listeCar = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $chaine = '';
        $max = mb_strlen($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()->can('ajouter_users')) {
        // if (Auth::user()->account_type == 'ADMIN') {
            $this->validate($request, [
                'nom' => 'bail|required|min:2',
                'prenom' => 'bail|required|min:2',
                'contact' => 'required|numeric|unique:users',
                'email' => 'required|email|unique:users',
                // 'roles' => 'required|min:1',
            ],[
                // required
                'nom.required' => 'Entrer le nom!',
                'prenom.required' => 'Entrer le prénom!',
                'contact.required' => 'Entrer le contact!',
                'email.required' => 'Entrer l\'adresse email!',
                // 'roles.required' => 'Attribuer un rôle à l\'utilisateur!',

                // Validation option 2
                'nom.min' => 'Nom inférieur à :min caractères',
                'prenom.min' => 'Prénom inférieur à :min caractères',
                'email.email' => 'Adresse email invalide',
                'contact.numeric' => 'Le numéro doit être numérique!',
                'contact.unique' => 'Numéro déjà occuppé',
                'email.unique' => 'Adresse email déjà occuppée',
            ]);

            $role = Role::findOrFail($request->roles);

            $password = $this->genererChaine(10);
            // $password = 'Secret@123449#';
            $user = User::create([
                'last_name' => request('nom'),
                'first_name' => request('prenom'),
                'email' => request('email'),
                'contact' => request('contact'),
                'profil' => 0,
                'password' => bcrypt($password),
                'account_type' => $role->name,
                'remember_token' => Str::random(40) . time()
            ]);

            if ($user) {
                // \LogActivity::addToLog('Ajout d\'un nouvel utilisateur');
                $this->syncPermissions($request, $user);
                Mail::to($user->email)->send(new AgentRegisterMail ($user, $password));
            }
        flashy()->success('Utilisateur créé avec succès!');

            return redirect()->route('compte.users.index');
        }else {
            // \LogActivity::addToLog('Erreur lours de l\'ajout d\'un nouvel utilisateur');
        flashy()->error('Impossible de créer ce compte!');

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->is('admin/*')) {
            $roles = Role::where('name', '!=', 'Super Admin')->get();
            // $roles = Role::get();
            $user=User::where('id',$id)->firstOrFail();
            $permissions = Permission::all('name', 'id');
            return view('admin.compte_users.edit', compact('user', 'roles', 'permissions'));
        } else {
            return back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->is('admin/*')) {
            $this->validate($request, [
                'roles' => 'required|min:1',
            ],[
                'roles.required' => 'Attribuer un rôle à l\'utilisateur!',
            ]);
            $role = Role::findOrFail($request->roles);
            $user = User::findOrFail($id);
            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->account_type = $role->name;
            $user->fill($request->except('roles', 'permissions'));
            $this->syncPermissions($request, $user);
            $user->save();

            if(!empty($user->getRoleNames())){
                foreach($user->roles->pluck('display_name') as $v){
                    $user_role = $v;
                }
            }

            // // \LogActivity::addToLog('Modification du rôle de '.$user->nom.' '.$user->prenom);
            flashy()->success('Le compte de '.$user->last_name.' '.$user->first_name.' a été modifié avec succès! Son nouveau rôle est '.$user_role.'.');
            return redirect()->route('compte.users.index');
        }else {
            flashy()->danger('Impossible de modifier ce compte!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flashy()->success('L\'tilisateur '.$user->last_name.' '.$user->first_name.' a été Suprimer avec succès! ');
        return back();

    }


    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
            $roles = $request->get('roles', []);
            $permissions = $request->get('permissions', []);

        // Get the roles
            $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
