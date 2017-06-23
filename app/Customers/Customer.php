<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;
use App\Customers\Collections\CustomerDetails;
use App\Customers\Collections\CustomerEditDetails;

class Customer extends Model
{
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        Customer::creating(function ($customer) {
            $customer->uid = self::generate();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uid';
    }

    protected static function generate()
    {
        $uid = str_random(30);
        if(self::where('uid', $uid)->count() > 0) {
            return self::generate();
        }
        return $uid;
    }

    // Relationships
    public function authTypes() 
    {
    	return $this->belongsToMany(AuthType::class, 'auth_credentials');
    }

    public function users()
    {
        return $this->hasMany(\App\Users\User::class);
    }

    public function roles()
    {
    	return $this->hasMany(\App\Users\Role::class);
    }

    // queries 
    public function listOfAll()
    {
        return CustomerDetails::format($this->with('roles', 'users')->get());
    }

    public function show()
    {
        return CustomerDetails::format($this->load('roles', 'users'));
    }

    public function edit()
    {
        return CustomerEditDetails::format($this);
    }
}
