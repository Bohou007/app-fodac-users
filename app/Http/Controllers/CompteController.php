<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function index(Request $request){
        $dossiers = Dossiers::where('user_id', Auth::user()->id)->get();
        $dossierSoumis = Dossiers::where('user_id', Auth::user()->id)->where('status', 0)->get()->count();
        $dossierEnCours = Dossiers::where('user_id', Auth::user()->id)->where('status', 1)->get()->count();
        $dossierEnAttente = Dossiers::where('user_id', Auth::user()->id)->where('status', 2)->get()->count();
        $dossierValider = Dossiers::where('user_id', Auth::user()->id)->where('status', 3)->get()->count();
        $dossierApprouver = Dossiers::where('user_id', Auth::user()->id)->where('approuve', 1)->where('fond_fodac', '!=', '')->get()->count();
        if ($request->is('admin/*')) {
            return view('admin.profile.index');
        }else {
            return view('users.home', compact('dossiers', 'dossierSoumis', 'dossierEnCours', 'dossierValider', 'dossierEnAttente', 'dossierApprouver'));
        }
    }


    public function show(Request $request){
        // \LogActivity::addToLog('Consultation de son profil');

        if ($request->is('admin/*')) {
            return view('admin.profile.index');
        }else {
            return view('users.home');
        }
    }

    public function edit(Request $request, User $user){
        // \LogActivity::addToLog('Consultation de son profil');

        if ($request->is('admin/*')) {
            return view('admin.profile.edit', compact('user'));
        }else {
            return view('users.home');
        }
    }


    public function passwordUpdate(){
        request()->validate([
            'password_actu' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required|string',
        ],[
            // required
            'password_actu.required' => 'Votre mot de passe actuel',
            'password.required' => 'Votre nouveau mot de passe',
            'password_confirmation.required' => 'Confirmer le mot de passe',
            'password.confirmed' => 'Echec Confirmation du mot de passe!',
            'password.min' => 'Pour des raisons de sécurité, le mot de passe doit faire minimum :min caractères!'
        ]);

        $userpass = Auth::user()->password;
        $Verif_userpass = request('password_actu');

        if(password_verify($Verif_userpass, $userpass)){
            Auth::user()->update([
                'password' => bcrypt(request('password')),
            ]);

            \LogActivity::addToLog('Modification du mot de passe');
            flash('Votre mot de passe a été modifié avec succès!')->success()->important();
            return back();
        }
        \LogActivity::addToLog('Echec lors de la modification du mot de passe');
        flash('Impossible de donner suite à votre requête. <br>Paramètres d\'authentification incorrects')->error()->important();
        return back();
    }


    public function profileUpdate(Request $request, $id){
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
        // \LogActivity::addToLog('Mise à jour de profile');

        flashy()->success('Votre profile a été mis à jour avec succès!');
        return redirect()->route('admin.profile');
    }


    public function logout(Request $request){
        // \LogActivity::addToLog('Fermetture de session utilisateur');
        // $deconnexion = auth()->logout();

        flash('Vous êtes bel et bien déconnecté(e)');
        if ($request->is('adn/*')) {
            return redirect()->route('admin.login');
        }else {
            return redirect()->route('auth.logout.redirect');
        }
    }

    public function logoutRedirect(Request $request){
        if ($request->is('adn/*')) {
            return view('auths.admin.logout_redirect');
        }else {
            return view('auths.users.logout_redirect');
        }
    }
}
