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
    ];

    public function piece_jointes()
    {
        return $this->belongsTo(PieceJointe::class, 'user_id');
    }

    public function supports()
    {
        return $this->belongsTo(Supports::class, 'user_id');
    }

    public function dossiersTreat()
    {
        return $this->belongsToMany(Dossiers::class, 'Treat_dossier', 'user_id', 'dossiers_id');
    }

    public function dossiersApprouve()
    {
        return $this->belongsToMany(Dossiers::class, 'Approuve_dossier', 'user_id', 'dossiers_id');
    }


    public function dossiersOc()
    {
        return $this->belongsTo(Dossiers::class,'user_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var arrayuser_id
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
