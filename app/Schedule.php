<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'start','end','day','room_id','classroom_id','lecturer_id','subject_id'
    ];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }
}
