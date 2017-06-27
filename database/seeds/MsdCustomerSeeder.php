<?php

use App\Customers\Customer;
use Illuminate\Database\Seeder;

class MsdCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create mid-states dist as default company/customer
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
    }
}
