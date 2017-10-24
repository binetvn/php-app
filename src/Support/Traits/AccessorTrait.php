<?php

namespace BiNet\App\Support\Traits;

use BiNet\App\Exceptions\NotPossibleException;

trait AccessorTrait {

	public function __get($property) {
		$method = static::toCamelCase("get_$property");
		if (method_exists($this, $method)) {
			return $this->{$method}();
		}
		 
		if (method_exists($this, $property)) {
			return $this->{$property}();
		}

		if (property_exists($this, $property)) {
			return $this->{$property};
		}

		throw new NotPossibleException(static::class.":$property does not exist.");
	}

	public function __set($property, $value) {
		// check fillable/ protected
		if ((property_exists($this, 'fillable') && $this->fillable 
				&& !in_array($property, $this->fillable))|| 
			(property_exists($this, 'protected') && $this->protected 
				&& in_array($property, $this->protected))) {
			// TODO: spy log
			throw new NotPossibleException(static::class.":$property is protected");
		}

		$method = static::toCamelCase("set_$property");
		if (method_exists($this, $method)) {
			$this->{$method}($value);
			return $this;
		}

		if (property_exists($this, $property)) {
			$this->{$property} = $value;
			return $this;
		}

		throw new NotPossibleException(static::class.":$property does not exist."); 
	}

	public static function toCamelCase($name) {
		$components = explode('_', $name);
		for ($i = 1; $i < count($components); $i++) {
			$components[$i] = ucfirst($components[$i]);
		}

		return implode('', $components);
	}
}