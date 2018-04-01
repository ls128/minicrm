<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = [
    	'name', 'lastname', 'company', 'email', 'phone'
    ];

    //protected $guarded = [];

    public function employees(){
    	return $this->belongsTo('App\Company', 'company', 'name');
    }
}
