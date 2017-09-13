<?php

namespace BiNet\App\Factories;

use BiNet\App\Support\Contracts\ICollection;
use BiNet\App\Exceptions\NotPossibleException;

/**
 * @attributes
 * 	$class  	Class  model class
 * 	$fillable 	array  keys fillable by mass-assign
 * 	$protected	array  keys protected from mass-assign
 */
class Factory {
	protected $class;
	protected $fillable;
	protected $protected;

	/**
	 * creates a new obj of $this->class, binds $data & returns
	 * @param  ICollection 	$data 
	 * @return $this->class 	
	 */
	public function fromData(ICollection $data) {
		$ob = new $this->class();
		$this->bind($ob, $data);
		return $ob;
	}

	/**
	 * returns whether this factory well-design or not
	 * @return bool
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
	 * binds $obj with data provided by $data
	 * @requires $obj neq null /\ $data neq null
	 * @modifies $obj
	 */
	public function bind(&$ob, ICollection $data) {
		if ($this->fillable) {
			foreach ($this->fillable as $att) {
				if ($data->containKey($att)) {
					$ob->$att = $data->get($att);
				}
			}
		} else {
			if ($this->protected) {
				$data = $data->removeKeys($this->protected);
			}

			foreach ($data->keys() as $att) {
				if (property_exists($this->class, $att)) {
					$ob->$att = $data->$att;
				}
			}	
		}
	}
}