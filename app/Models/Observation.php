<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'decision',
        'content',
        'dossiers_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function dossiers()
    {
        return $this->belongsTo(Dossiers::class,'dossiers_id');
    }
}
