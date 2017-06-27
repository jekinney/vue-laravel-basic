<?php

namespace App\Customers\Collections;

use App\Collections\BaseCollection;
use App\Users\Collections\RoleDetails;

class CustomersUserDetails extends BaseCollection
{
	protected function setData($user)
	{
		$details = new RoleDetails();

		return  [
			'uid' => $user->uid,
			'name' => $user->first_name.' '.$user->last_name,
			'email' => $user->email,
			'created' => $user->created_at->toDateTimeString(),
			'roles' => $details->format($user->roles),
			'status' => $user->deleted_at? 'Deactivated':'Active',
		];
	}
}