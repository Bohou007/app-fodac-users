<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index(Request $request){
        if ($request->is('admin/*')) {
            return view('admin.home');
        }else {
            return view('users.home');
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
