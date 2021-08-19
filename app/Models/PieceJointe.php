<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_doc',
        'type_doc',
        'path_doc',
        'dossiers_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function dossiers()
    {
        return $this->belongsToMany(Dossiers::class, 'piece_jointes_dossiers', 'dossiers_id', 'piece_jointe_id');
    }

}
