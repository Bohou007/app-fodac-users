<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivateCompteAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $token)
    {
        $user = User::where('remember_token', $token)->first();

        if (empty($user)) {
            // \LogActivity::addToLog('Lien d\'activation expiré ou invalide :: Par '.$user->email);
            flashy()->error('Votre lien d\'activation est invalide ou a déja été utilisé.');
            return redirect()->route('login');
        }else {
            if ($user->email_verified_at == null) {
                return view('auth.newPassword', compact('token'));
            }else{
                flashy()->error('Votre lien d\'activation est invalide ou a déja été utilisé.');
                return redirect()->route('login');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(Request $request, $token)
    {
        // $this->validate($request,[
        //     'password' => 'required|string|confirmed|min:8',
        //     'confirmation_password' => 'required|string',
        // ],[
        //     // required
        //     'password.required' => 'Votre nouveau mot de passe',
        //     'confirmation_password.required' => 'Confirmer le mot de passe',
        //     'password.confirmed' => 'Echec Confirmation du mot de passe!',
        //     'password.min' => 'Pour des raisons de sécurité, le mot de passe doit faire minimum :min caractères!'
        // ]);

            $user = User::where('remember_token', $token)->first();
                $newtoken = Str::random(40) . time();
                $date = now();
                if (empty($user)) {
            //         // \LogActivity::addToLog('Lien d\'activation expiré ou invalide :: Par '.$user->email);
                    flashy()->error('Votre lien d\'activation est expiré ou invalide.');
                    return redirect()->route('login');
             }else {

                $user->update(['remember_token' => $newtoken,'password'=> bcrypt($request->password),'email_verified_at' => $date]);
            //     // \LogActivity::addToLog('Lien d\'activation valide et compte maintenant activé :: Par '.$user->email );
                flashy()->success('Félicitations! Votre compte est maintenant activé.');
                return redirect()->route('home');
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
        //
    }
}
