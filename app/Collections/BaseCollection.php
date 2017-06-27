<?php

namespace App\Collections;

abstract class BaseCollection
{
	abstract protected function setData($model);

	public function format($models)
	{
		if(class_basename($models) == 'Collection') {
			foreach($models as $model) {
				$collection[] =  $this->setData($model);
			}
			return $collection;
		} 
		return $this->setData($models);	
	}
}