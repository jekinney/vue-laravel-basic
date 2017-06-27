<?php

use App\Users\Role;
use App\Customers\Customer;
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

        $msd = Customer::create([
            'id' => 1,
            'name' => 'Mid-States Distributing',
            'Title' => 'Mid-States Distributing',
            'tag_line' => 'The Heart and Soul of Farm, Ranch and Home',
            'base_code' => 'msd',
            'base_email' => 'msdist.com',
        ]);

        $msd->ldap()->create([
            'customer_uid' => $msd->uid,
            'prefix' => '',
            'suffex' => '',
            'controllers' => '10.0.0.45',
            'base_dn' => 'DC=msd,DC=lan',
            'admin_suffix' => '',
            'admin_username' => 'ldap',
            'admin_password' => '?2=XsL^_p3A4PBap'
        ]);

        // create default master user
        $admin = $msd->users()->create([
        	'id' => 1,
        	'first_name' => 'MSD',
            'last_name' =>  'Admin',
        	'email' => 'admin@msdist.com',
        	'password' => 'secret',
        ]);

        // assign master user admin role
        $admin->roles()->attach(Role::find(1));
    }
}
