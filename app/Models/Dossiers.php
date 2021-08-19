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

    public function treatDossier()
    {
        return $this->hasMany(Treat_dossier::class, 'dossiers_id');
    }

    public function taches()
    {
        return $this->hasOne(Taches::class, 'dossiers_id');
    }

    public function approuveDossier()
    {
        return $this->hasMany(Approuve_dossier::class, 'dossiers_id');
    }

    public function pieceJointe()
    {
        return $this->belongsToMany(PieceJointe::class, 'piece_jointes_dossiers', 'dossiers_id', 'piece_jointe_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function observation()
    {
        return $this->hasMany(Observation::class, 'dossiers_id');
    }
}
