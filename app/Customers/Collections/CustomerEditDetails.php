<?php

namespace App\Customers\Collections;

use App\Users\Collections\RoleEditDetails;

class CustomerEditDetails
{
	public static function format($customer)
	{
		$details = new RoleEditDetails();

		return [
			'uid' => $customer->uid,
			'name' => $customer->name,
			'code' => $customer->base_code,
			'tag' => $customer->tag_line,
			'users_count' => $customer->users->count(),
			'roles' => $details->format($customer->roles),
			'status' => $customer->deleted_at? 'Deactivated':'Active',
		];
	}
}