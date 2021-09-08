<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;
    const DELETE = 1;
    const NODELETE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'contact',
        'profil',
        'account_type',
        'name_corporate',
        'email_corporate',
        'contact_corporate',
        'regist_corporate',
        'address_corporate',
        'terms_conditions',
        'remember_token',
        'email_verified_at'
    ];

    public function piece_jointes()
    {
        return $this->hasMany(PieceJointe::class, 'user_id');
    }

    public function taches()
    {
        return $this->hasMany(Taches::class, 'user_id');
    }

    public function supports()
    {
        return $this->hasMany(Supports::class, 'user_id');
    }

    public function treatDossier()
    {
        return $this->hasMany(Treat_dossier::class, 'user_id');
    }

    public function approuveDossier()
    {
        return $this->hasMany(Approuve_dossier::class, 'user_id');
    }

    public function observation()
    {
        return $this->hasMany(Observation::class, 'user_id');
    }

    public function dossiers()
    {
        return $this->hasMany(Dossiers::class,'user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class,'user_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
