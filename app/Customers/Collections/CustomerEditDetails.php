<?php

namespace App\Customers\Collections;

use App\Conllections\BaseCollection;
use App\Users\Collections\RoleEditDetails;

class CustomerEditDetails extends BaseController;
{
	public function format($customer)
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