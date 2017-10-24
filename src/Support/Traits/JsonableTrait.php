<?php

namespace BiNet\App\Support\Traits;

trait JsonableTrait {
	public function toJson() {
		return json_encode($this);
	}

	public function jsonSerialize() {
		if (property_exists(get_class($this), 'jsonable') && $this->jsonable) {
			$atts = $this->jsonable;
			$data = [];
			foreach ($this->jsonable as $att) {
				$data[$att] = $this->{$att};
			}

			return $data;
		} 

		return get_object_vars($this);
	}
}