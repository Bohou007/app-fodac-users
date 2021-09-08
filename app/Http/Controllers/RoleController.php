<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

use function App\Helpers\slugify;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        $permissions = Permission::all();

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->is('admin/*')) {
            $this->validate($request, [
                'display_name' => 'required|unique:roles|min:2|max:191',
                'permissions' => [
                    '*' => 'required'
                ]
            ],[
                'display_name.required' => 'Vous n\'avez pas nommé le rôle',
                'display_name.unique' => 'Un rôle a déjà été créé avec ce nom',
                'display_name.min' => 'Le nom du rôle doit faire minimum :min caractères',
                'display_name.max' => 'Le nom du rôle doit faire maximum :max caractères',
                'permissions.required' => 'Définissez une ou des permission(s) pour ce nouveau rôle',
            ]);

            $role = new Role;
            $role->name = $request->display_name;
            $role->display_name = $request->display_name;

            if($role->save())
            {
                // \LogActivity::addToLog('créaction du nouveau rôle '.$role->display_name);

                $role->syncPermissions($request->permissions);
                flashy()->success('Rôle <strong>'.$role->display_name.'</strong> ajouté.');
            }
            return redirect()->route('admin.roles');
        } else {
           return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.show', compact('role', 'permissions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required|min:2|max:191|unique:roles,display_name,'.$id,
        ],[
            'display_name.required' => 'Vous n\'avez pas nommé le rôle',
            'display_name.unique' => 'Un rôle a déjà été créé avec ce nom',
            'display_name.min' => 'Le nom du rôle doit faire minimum :min caractères',
            'display_name.max' => 'Le nom du rôle doit faire maximum :max caractères',
        ]);

        if($role = Role::findOrFail($id)) {
            if($role->name === 'Super Admin') {
                $role->syncPermissions(Permission::all());
                // \LogActivity::addToLog('Modification du rôle '.$role->display_name);
                flashy()->success('Modification du rôle '.$role->display_name);
                return redirect()->route('admin.roles');
            } else {
                $role->name = $request->display_name;
                $role->display_name = Str::slug($request->display_name, $separator = '_');
                $role->save();

                $role->syncPermissions($request->permissions);
                // \LogActivity::addToLog('Modification du rôle '.$role->display_name);
                flashy()->success( $role->display_name . ' modifié.');
            }
        } else {
            // \LogActivity::addToLog('Erreur lors de la modification du rôle '.$role->display_name);
            flashy()->success('Le rôle avec l\'identifiant '.$id.' n\'a pas été trouvé.');
        }
        return redirect()->route('admin.roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }


}
