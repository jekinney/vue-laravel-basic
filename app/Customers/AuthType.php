<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;

class AuthType extends Model
{
    protected $guarded = [];

    public function customers()
    {
    	return $this->belongsToMany(Customer::class, 'auth_credentials');
    }
}
