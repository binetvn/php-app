<?php

namespace BiNet\App\Support;

class Container {
	/**
	 * @var Array
	 */
	private $data;

	public function __construct($data=[]){
		$this->data = $data;
	}

	public function __set($key, $value) {
		$this->data[$key] = $value;
	}

	public function __get($key) {
		if (isset($this->data[$key])) {
			return $this->data[$key];
		}

		return null;
	}
}