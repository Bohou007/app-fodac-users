<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approuve_dossier extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dossiers_id',
        'user_id',
        'role'
    ];

}
