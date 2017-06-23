<?php

namespace App\Users\Collections;

class RoleEditDetails
{
	public function format($role)
	{
		foreach($role as $r) {
			$roles[] = [
				'id' => $r['id'],
				'slug' => $r['slug'],
				'name' => $r['name'],
			];
		}
		return $roles;
	}
}