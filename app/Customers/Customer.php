<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

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

    public function roles()
    {
    	return $this->hasMany(\App\Users\Role::class);
    }
}
