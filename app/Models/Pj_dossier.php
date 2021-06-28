<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pj_dossier extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dossiers_id',
        'piece_jointe_id',
    ];
}
