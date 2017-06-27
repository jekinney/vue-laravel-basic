<?php

namespace App\Users\Collections;

use App\Collections\BaseCollection;

class UserEdit extends BaseCollection
{
	public function setData($user)
	{
		$details = new RoleDetails();

		return [
			'uid' => $user->uid,
			'name' => $user->first_name.' '.$user->last_name,
			'email' => $user->email,
			'owning_type' => strtolower(class_basename($user->userable)),
			'owning_name' => $user->userable->name,
			'owning_uid' => $user->userable->uid,
			'roles' => $details->format($user->roles),
			'status' => $user->deleted_at? 'Deactivated':'Active',
		];
	}
}