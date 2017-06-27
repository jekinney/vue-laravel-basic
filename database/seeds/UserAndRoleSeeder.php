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
            ['id' => 1,  'customer_id' => 1, 'slug' => 'msd-full-admin', 'name' => 'MSD Full Admin', 'description' => 'Full system admin from Mid-States dist.'],
        	['id' => 2,  'customer_id' => 1, 'slug' => 'msd-portal-admin', 'name' => 'MSD Portal Admin', 'description' => 'Portal admin from Mid-States dist.'],
        	['id' => 3, 'customer_id' => 1, 'slug' => 'msd-employee', 'name' => 'MSD Employee', 'description' => 'Mid-States Dist. employee.'],
        ];

        // loop through each role and create in database
        foreach($roles as $role) {
        	Role::create($role);
        }

        // create default master user
        $admin = User::create([
        	'id' => 1,
        	'customer_id' => 1,
        	'first_name' => 'MSD',
            'last_name' =>  'Admin',
        	'email' => 'admin@msdist.com',
        	'password' => 'secret',
        ]);

        // assign master user admin role
        $admin->roles()->attach(Role::find(1));
    }
}
