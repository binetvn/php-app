<?php

namespace BiNet\App\Support;

class Container {
	/**
	 * @var array
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

	/**
	 * return array of keys in this
	 * @return [type] [description]
	 */
	public function keys() {
		return array_keys($this->data);
	}

	/**
	 * remove values associated with specified $keys (if exist) from $this->data & returns
	 * @param  array  $keys keys array to remove
	 */
	public function removeKeys($keys = []) {
		return array_diff_key($this->data, array_flip($keys));
	}
}