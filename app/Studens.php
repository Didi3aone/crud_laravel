<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studens extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'fb','mobile'
    ];
}
