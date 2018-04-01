<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name', 'email', 'logo', 'website'
    ];

    //protected $guarded = [];

    public function employees(){
    	return $this->hasMany('App\Employee', 'company');
    }
}
