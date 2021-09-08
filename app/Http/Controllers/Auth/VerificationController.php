<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RefreshActivationAdmin;
use App\Mail\RefreshActivationUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    // public function activate(Request $request, $token = null){

    //     $user = User::where('remember_token', $token)->first();
    //     $newtoken = Str::random(40) . time();
    //     $date = now();
    //     if (empty($user)) {
    //         // \LogActivity::addToLog('Lien d\'activation expiré ou invalide :: Par '.$user->email);
    //         flashy()->error('Votre lien d\'activation est expiré ou invalide.');
    //         return redirect()->route('login');
    //     }
    //     $user->update(['remember_token' => $newtoken, 'email_verified_at' => $date]);
    //     // \LogActivity::addToLog('Lien d\'activation valide et compte maintenant activé :: Par '.$user->email );
    //     flash('Félicitations! <br> Votre compte est maintenant activé. <br> Vous pouvez à présent vous connecter.')->success()->important();
    //     return redirect()->route('login');

    // }

    public function activate(Request $request, $token){

        $user = User::where('remember_token', $token)->first();

        if (empty($user)) {
            // \LogActivity::addToLog('Lien d\'activation expiré ou invalide :: Par '.$user->email);
            flashy()->error('Votre lien d\'activation est invalide ou a déja été utilisé.');
            return redirect()->route('login');
        }else {
            if ($user->email_verified_at == null) {
                return view('auth.newPassword');
            }else{
                flashy()->error('Votre lien d\'activation est invalide ou a déja été utilisé.');
                return redirect()->route('login');
            }
        }

    }

    public function refreshActivationLink(Request $request, $token = null){
        $user = User::where('remember_token', $token)->first();
        $newtoken = Str::random(40) . time();

        if ($user->account_type == 'ADMIN' || $user->account_type == 'STAFF' || $user->account_type == 'CONSULTANT') {
            $password = $this->genererChaine(10);
            $user->update(['remember_token' => $newtoken, 'password' => bcrypt($password)]);
            Mail::to($user->email)->send(new RefreshActivationAdmin($user, $password));
        }else {
            $user->update(['remember_token' => $newtoken]);
            Mail::to($user->email)->send(new RefreshActivationUser($user));
        }
        // \LogActivity::addToLog('Envoi de nouveau lien d\'activation de compte a '.$user->email );
        flash('Consultez votre adresse électronique. <br> Vous avez recu un nouveau lien d\'activation')->success()->important();
        return back();
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
}
