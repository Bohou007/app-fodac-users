<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\Notifications;
use App\Models\PieceJointe;
use App\Models\Supports;
use Carbon\Carbon;
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
                // flashy()->info('Bienvenue '. Auth::user()->last_name.' '. Auth::user()->first_name. '. Nous sommes heureux de vous revoir !' );
                $dossier = Dossiers::where('user_id', Auth::user()->id)->get();
                $supports = Supports::where('user_id', Auth::user()->id)->get();
                $notifications = Notifications::where('user_id', Auth::user()->id)->get();
                return view('users.home', compact('dossier', 'supports', 'notifications'));
            }
        }else {
            // flashy()->info('Bienvenue '. Auth::user()->last_name.' '. Auth::user()->first_name. '. Nous sommes heureux de vous revoir !' );
            $dossier = Dossiers::all();
            $supports = Supports::all();
            $notifications = Notifications::where('user_id', Auth::user()->id)->get();
            return view('admin.home', compact('dossier', 'supports', 'notifications'));
        }
    }
}
