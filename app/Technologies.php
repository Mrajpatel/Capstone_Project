<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    // setting the fillable properties
    protected $fillable = [
        'code',
        'description',
        'condition',
        'tech_type'
    ];

    // adding dependencies
    public function user(){
        return $this->belongsTo('App\User');
    }
}
