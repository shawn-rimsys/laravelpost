<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'city',
    	'content'
    ];
}
