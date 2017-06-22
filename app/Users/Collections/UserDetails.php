<?php

namespace App\Users\Collections;

class UserDetails
{
	public function format($user)
	{
		return [
			'uid' => $user->uid,
			'name' => $user->name,
			'email' => $user->email,
			'customer_name' => $user->customer->name,
			'customer_uid' => $user->customer->uid,
			'roles' => $this->rolesRelation($user->roles),
			'status' => $user->deleted_at? 'Deactivated':'Active',
		];
	}

	protected function rolesRelation($roles)
	{
		if($roles) {
			foreach($roles as $role) {
				$data[] =  $role->slug ;
			}
			return $data;
		}
		return null;
	}
}