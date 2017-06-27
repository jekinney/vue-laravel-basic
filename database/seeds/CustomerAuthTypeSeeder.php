<?php

use App\Customers\Customer;
use App\Customers\AuthType;
use Illuminate\Database\Seeder;

class CustomerAuthTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // auth type array
        $types = [
        	['id' => 1, 'name' => 'Traditional', 'description' => 'Manually set you your users as needed.'],
        	['id' => 2, 'name' => 'Upload File', 'description' => 'Upload a CSV or Excel file with all your users information.'],
        	['id' => 3, 'name' => 'On premises Active Directory', 'description' => 'Import your users from an Microsoft Active Directory located loaclly.'],
        	['id' => 4, 'name' => 'Azure Active Directory', 'description' => 'Import your users from an Microsoft Azure Active Directory hosted on Azure.'],
        	['id' => 5, 'name' => 'Office 365', 'description' => 'Import users from Microsoft Office 365 Single Sign On feature.']
        ];

        // loop through types and create in database
        foreach($types as $type)
        {
        	AuthType::create($type);
        }
    }
}
