<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taches extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'dossiers_id',
        'assign_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dossiers()
    {
        return $this->hasOne(Dossiers::class, 'dossiers_id');
    }
}
