<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $guarded = [];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
