<?php

namespace App\Customers\Collections;

use App\Users\Collections\RoleDetails;

class CustomerDetails
{
	public static function format($customer)
	{
		if(class_basename($customer) == 'Collection') {
			foreach($customer as $cust) {
				$customers[] =  self::setData($cust);
			}
			return $customers;
		} 
		return self::setData($customer);	
	}

	protected static function setData($customer)
	{
		$details = new RoleDetails();

		return  [
			'uid' => $customer->uid,
			'name' => $customer->name,
			'code' => $customer->base_code,
			'tag' => $customer->tag_line,
			'users_count' => $customer->users->count(),
			'roles_count' => $customer->roles->count(),
			'roles' => $details->format($customer->roles),
			'status' => $customer->deleted_at? 'Deactivated':'Active',
		];
	}
}