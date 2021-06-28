<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\PieceJointe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dossier = Dossiers::where('user_id', Auth::user()->id)->get();
        if (Auth::user()->account_type == 'OC') {
            if(!$dossier->count()){
                $dossiers = PieceJointe::where('user_id', Auth::user()->id)->get();
                return view('users.dossiers.demande', compact('dossiers'));
            }else{
                return view('users.home');
            }
        }else {
            return view('admin.home');
        }
    }
}
