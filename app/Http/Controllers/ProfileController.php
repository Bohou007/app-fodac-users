<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('users.profile.edit');
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
        $user = User::findOrFail(Auth::user()->id);
        request()->validate([
            'lastname' => 'required|string|max:191',
            'firstname' => 'required|string|max:191',
        ],[
            // required
            'lastname.required' => 'Veuillez entrer votre nom!',
            'firstname.required' => 'Vous devez entrer votre prénom!',
        ]);

        $user->last_name = $request->lastname;
        $user->first_name = $request->firstname;

        if ($request->profil == 1) {
            $this->validate($request, [
                'namecorporate' => 'required|min:3',
                'emailcorporate' => 'required|email',
                'contactorcporate' => 'required',
                'registcorporate' => 'required',
                'addresscorporate' => 'required',
            ],[
                'namecorporate.required' => 'Veuillez entrer le nom de votre entreprise',
                'emailcorporate.required' => 'Veuillez entrer l\'adresse mail de votre entreprise',
                'contactorcporate.required' => 'Veuillez entrer le contact de votre entreprise',
                'registcorporate.required' => 'Veuillez entrer le registre de commerce de votre entreprise',
                'addresscorporate.required' => 'Veuillez entrer la localisation de votre entreprise',

                'namecorporate.min' => 'le nom de votre entreprise doit avoir en moyenne :min caractères',
                'emailcorporate.email' => 'le mail nom de votre entreprise doit etre valide.',
            ]);
            $user->profil = $request->profil;
            $user->name_corporate = $request->namecorporate;
            $user->email_corporate = $request->emailcorporate;
            $user->contact_corporate = $request->contactcorporate;
            $user->regist_corporate = $request->registcorporate;
            $user->address_corporate = $request->addresscorporate;
        }

        if($request->password){

            $this->validate($request,[
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ],[
            // required
            'password.required' => 'Votre nouveau mot de passe',
            'password_confirmation.required' => 'Confirmer le mot de passe',
            'password.confirmed' => 'Echec Confirmation du mot de passe!',
            'password.min' => 'Pour des raisons de sécurité, le mot de passe doit faire minimum :min caractères!'
        ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        flash('Votre profile a été mis à jour avec succès!')->success()->important();
        return back();
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
}
