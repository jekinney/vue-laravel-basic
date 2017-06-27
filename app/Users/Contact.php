<?php

namespace App\Users;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public function customer()
    {
    	return $this->belongsTo(\App\Customers\Customer::class);
    }
}
