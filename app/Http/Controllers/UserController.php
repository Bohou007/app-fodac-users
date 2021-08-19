<?php

namespace App\Http\Controllers;

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
        if (Auth::user()->account_type == 'ADMIN') {
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

        // if (Auth::user()->can('ajouter_users')) {
        if (Auth::user()->account_type == 'ADMIN') {
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


            $password = $this->genererChaine(10);
            $user = User::create([
                'last_name' => request('nom'),
                'first_name' => request('prenom'),
                'email' => request('email'),
                'contact' => request('contact'),
                'profil' => 0,
                'password' => bcrypt($password),
                'account_type' => 'admin',
                'remember_token' => Str::random(40) . time()
            ]);

            if ($user) {
                // \LogActivity::addToLog('Ajout d\'un nouvel utilisateur');
                $this->syncPermissions($request, $user);
                Mail::to($user->email)->send(new CompteCreatedMail ($user, $password));
            }
        flashy()->success('Utilisateur créé avec succès!');

            return redirect()->route('admin.register');
        }else {
            // \LogActivity::addToLog('Erreur lours de l\'ajout d\'un nouvel utilisateur');
        flashy()->danger('Impossible de créer ce compte!');

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
    public function edit($id)
    {
        if (Auth::user()->account_type == 'ADMIN') {
            $roles = Role::where('display_name', '!=', 'Super Admin')->get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
