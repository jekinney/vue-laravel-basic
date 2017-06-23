<?php

namespace App\Users\Collections;

class RoleDetails
{
	public function format($role)
	{
		foreach($role as $r) {
			$roles[] = [
				'slug' => $r['slug'],
				'name' => $r['name'],
			];
		}
		return $roles;
	}
}