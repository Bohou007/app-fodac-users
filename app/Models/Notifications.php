<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'group',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
