<?php

namespace App\Users\Collections;

class UserDetails
{
	public function format($user)
	{
		$details = new RoleDetails();

		return [
			'uid' => $user->uid,
			'name' => $user->name,
			'email' => $user->email,
			'customer_name' => $user->customer->name,
			'customer_uid' => $user->customer->uid,
			'roles' => $details->format($user->roles),
			'status' => $user->deleted_at? 'Deactivated':'Active',
		];
	}
}