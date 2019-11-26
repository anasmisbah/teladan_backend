<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'nip'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
