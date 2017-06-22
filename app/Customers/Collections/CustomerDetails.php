<?php

namespace App\Customers\Collections;

class CustomerDetails
{
	public function format($customer)
	{
		return [
			'uid' => $customer->uid,
			'name' => $customer->name,
			'code' => $customer->base_code,
			'tag' => $customer->tag_line,
			'users_count' => $customer->users_count,
			'roles_count' => $customer->roles->count(),
			'roles' => $this->rolesRelation($customer->roles),
			'status' => $customer->deleted_at? 'Deactivated':'Active',
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