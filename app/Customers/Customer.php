<?php

namespace App\Customers;

use App\Users\Collections\UserDetails;
use Illuminate\Database\Eloquent\Model;
use App\Customers\Collections\CustomerDetails;
use App\Customers\Collections\CustomerEditDetails;
use App\Customers\Collections\CustomersUserDetails;

class Customer extends Model
{
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $with = ['roles'];

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
    public function users()
    {
        return $this->hasMany(\App\Users\User::class);
    }

    public function roles()
    {
    	return $this->hasMany(\App\Users\Role::class);
    }

    public function ldap()
    {
        return $this->hasOne(Ldap::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // queries 
    public function listOfAll()
    {
        return CustomerDetails::format($this->with('users')->get());
    }

    public function show()
    {
        $customer = new CustomerDetails();
        return $customer->format($this->load('users'));
    }

    public function edit()
    {
        $customer = new CustomerEditDetails();
        return $customer->format($this);
    }

    public function listOfUsers()
    {
        $user = new CustomersUserDetails();
        return $user->format($this->users);
    }
}
