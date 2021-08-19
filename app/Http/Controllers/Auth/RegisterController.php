<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => ['required', 'string', 'unique:users'],
            'profil' => ['required', 'integer'],
            // 'namecorporate' => ['string'],
            // 'emailcorporate' => ['string', 'email', 'max:255', 'unique:users'],
            // 'contactcorporate' => ['string', 'unique:users'],
            // 'registecorporate' => ['string'],
            // 'addresscorporate' => ['string'],
            'terms_conditions' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'last_name' => $data['lastname'],
            'first_name' => $data['firstname'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'profil' => $data['profil'],
            'account_type' => 'OC',
            'name_corporate' => $data['namecorporate'],
            'email_corporate' => $data['emailcorporate'],
            'contact_corporate' => $data['contactcorporate'],
            'regist_corporate' => $data['registcorporate'],
            'address_corporate' => $data['addresscorporate'],
            'terms_conditions' => $data['terms_conditions'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
