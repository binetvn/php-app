<?php

namespace BiNet\App\Factories;

use BiNet\App\Container;
use BiNet\App\Exceptions\NotPossibleException;

class Factory {
	protected $class;
	protected $fillable;
	protected $protected;

	/**
	 * creates a new obj of $this->class, binds $data & returns
	 * @param  Container $data 	data collection for binding
	 * @return $this->class 	obj of type $this->class
	 */
	public function fromData(Container $data) {
		$obj = new $this->class();
		$this->bind($obj, $data);
		return $obj;
	}

	/**
	 * returns whether this factory well-design or not
	 */
	public function validate() {
		// validate
		if (!isset($this->class)) {
			throw new NotPossibleException(static::class.'.bind(): domain $class is not defined.');
		}

		if (isset($this->fillable) && isset($this->protected)) {
			throw new NotPossibleException('DomainFactory.bind(): use fillable or protected only, not both.');
		}
	}
	
	/**
	 * bind $obj with data provided by $data
	 * @requires $obj neq null /\ $data neq null
	 * @modifies $obj
	 */
	public function bind(&$obj, Container $data) {
		if ($this->fillable) {
			foreach ($this->fillable as $att) {
				if (array_key_exists($att, 
					$data)) {
					$obj->$att = $data->$att;
				}
			}
		} else {
			if ($this->protected) {
				$data = $data->removeKeys($this->protected);
			}

			foreach ($data->keys() as $att) {
				if (property_exists($this->class, $att)) {
					$obj->$att = $data->$att;
				}
			}	
		}
	}
}