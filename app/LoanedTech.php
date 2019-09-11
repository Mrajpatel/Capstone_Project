<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanedTech extends Model
{
    //
    protected $fillable = [
        'user_id',
        'tech_id',
        'due_time',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tech(){
        return $this->belongsTo('App\Tech');
    }
}
