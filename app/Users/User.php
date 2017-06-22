<?php

namespace App\Users;

use App\Users\Collections\UserDetails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        User::creating(function ($user) {
            $user->uid = self::generate();
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

    /**
     *  Always hash incoming passwords
     *
     * @return string
     */
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }

    protected static function generate()
    {
        $uid = str_random(64);
        if(self::where('uid', $uid)->count() > 0) {
            return self::generate();
        }
        return $uid;
    }

    // relationships
    /**
     *  many to many to Role class
     */
    public function roles() 
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function customer() {
        return $this->belongsTo(\App\Customers\Customer::class);
    }

    // Queries
    /**
     *  List of all users for msd admin
     */
    public function getListOfAll()
    {
        return $this->with('roles', 'customer')->get()->map(function($user, $key) {
            $details = new UserDetails();
            return $details->format($user);
        });
    }
}
