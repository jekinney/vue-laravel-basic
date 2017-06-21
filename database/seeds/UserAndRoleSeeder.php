<?php

use App\Users\User;
use App\Users\Role;
use Illuminate\Database\Seeder;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// set default roles array
        $roles = [
        	['id' => 1,  'customer_id' => 1, 'slug' => 'lms-portal-admin', 'name' => 'LMS Portal Admin', 'description' => 'Full system admin'],
        	['id' => 2, 'customer_id' => 1, 'slug' => 'lms', 'name' => 'LMS', 'description' => 'Basic LMS user'],
        ];

        // loop through each role and create in database
        foreach($roles as $role) {
        	Role::create($role);
        }

        // create default master user
        $admin = User::create([
        	'id' => 1,
        	'customer_id' => 1,
        	'name' => 'LMS Admin',
        	'email' => 'admin@lms.com',
        	'password' => 'secret',
        ]);

        // assign master user admin role
        $admin->roles()->attach(Role::find(1));
    }
}
