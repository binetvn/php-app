<?php

namespace BiNet\Core\Entities;

class Entity {
	protected $id;
	protected $primaryKey = 'id';

	public function getId($id) {
		return $this->id;
	}

	public function getPrimaryKey() {
		return $this->primaryKey;
	}

	public function __get($property) {
		return $this->$property;
	}

	public function __set($property, $value) {
		$this->property = $value;
	}
}