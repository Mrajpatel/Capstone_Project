<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    //
    protected $fillable = [
        'code',
        'description',
        'condition',
        'tech_type'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
