<?php

namespace App\Customers\Collections;

use App\Collections\BaseCollection;
use App\Users\Collections\RoleDetails;

class CustomerDetails extends BaseCollection
{
	protected function setData($customer)
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