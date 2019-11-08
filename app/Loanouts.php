<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loanouts extends Model
{
    // Setting the changable properties
    protected $fillable = [
        'user_id',
        'tech_id',
        'due_time',
    ];

    // Setting the dependencies
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Setting the dependencies
    public function tech()
    {
        return $this->belongsTo('App\Tech');
    }
}
