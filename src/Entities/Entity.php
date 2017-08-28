<?php

namespace BiNet\App\Entities;

class Entity {
	protected $id;
	protected $primaryKey = 'id';

	public function __get($property) {
		return $this->$property;
	}

	public function __set($property, $value) {
		$this->property = $value;
	}
}