<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossiers extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'budget_oc',
        'capitale_oc',
        'capitale_demander',
        'status',
        'approuve',
        'fond_fodac',
        'user_id'
    ];

    public function userConsultant()
    {
        return $this->belongsToMany(Treat_dossier::class, 'Treat_dossier', 'user_id', 'dossiers_id');
    }

    public function userStaff()
    {
        return $this->belongsToMany(Treat_dossier::class, 'Approuve_dossier', 'user_id', 'dossiers_id');
    }

    public function PieceJointe()
    {
        return $this->belongsToMany(PieceJointe::class, 'piece_jointes_dossiers', 'dossiers_id', 'piece_jointe_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
