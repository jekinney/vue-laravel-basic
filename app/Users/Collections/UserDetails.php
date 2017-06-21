<?php

namespace App\Users\Collections;

class UserDetails
{
	public function format($user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'roles' => $this->rolesRelation($user->roles)
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