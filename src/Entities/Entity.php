<?php

namespace BiNet\App\Entities;

class Entity {
	protected $primaryKey = 'id';

	public function id() {
		return $this->{$this->primaryKey};
	}

	public function isNewRecord() {
		$id = $this->id();
		if ($id) {
			return true;
		}
		return false;
	}

	public function __get($property) {
		if (method_exists($this, $property)) {
			return $this->{$property}();
		}

		return $this->{$property};
	}

	public function __set($property, $value) {
		$this->{$property} = $value;
	}
}