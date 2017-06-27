<?php

namespace App\Users\Collections;

use App\Collections\BaseCollection;

class UserDetails extends BaseCollection
{
	public function setData($user)
	{
		$details = new RoleDetails();

		return [
			'uid' => $user->uid,
			'name' => $user->first_name.' '.$user->last_name,
			'email' => $user->email,
			'customer_name' => $user->customer->name,
			'customer_uid' => $user->customer->uid,
			'roles' => $details->format($user->roles),
			'status' => $user->deleted_at? 'Deactivated':'Active',
		];
	}
}