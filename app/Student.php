<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nim','user_id','classroom_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
