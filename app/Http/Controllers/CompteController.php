<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
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
            return view('admin.home');
        }else {
            return view('users.home', compact('dossiers', 'dossierSoumis', 'dossierEnCours', 'dossierValider', 'dossierEnAttente', 'dossierApprouver'));
        }
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
