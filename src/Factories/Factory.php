<?php

namespace BiNet\App\Factories;

use BiNet\App\Support\Contracts\ICollection;
use BiNet\Core\Support\Collection;
use BiNet\App\Exceptions\NotPossibleException;

/**
 * @attributes
 * 	$class  	type   model class
 * 	$fillable 	array  keys fillable by mass-assign
 * 	$protected	array  keys protected from mass-assign
 */
class Factory {
	protected $class;

	public function __construct() {
		$this->validateOrFail();
	}

	/**
	 * validate whether $this violates any domain constraints
	 * throws NotPossibleException if any
	 */
	public function validateOrFail() {
		if (!$this->class) {
			throw new NotPossibleException(static::class.': domain class is not defined.');
		}
	}

	/**
	 * creates a new obj of $this->class, binds $data & returns
	 */
	public function fromArray(array $data) {
		return static::createFromArray($this->class, $data);
	}

	/**
	 * creates array objects of $this->class from $data & returns
	 */
	public function fromArrays(array $datas) {
		return static::createFromArrays($this->class, $datas);
	}

	public function update(&$ob, array $data) {
		static::bind($ob, $data);
	}

	/**
	 * creates a new obj of specified $class, binds $data & returns
	 * @param  ICollection 	$data 
	 * @return $class 	
	 */
	public static function createFromArray($class, array $data) {
		if ($data === null) {
			return null;
		}
		
		$ob = new $class();
		static::bind($ob, $data);
		return $ob;
	}

	public static function createFromArrays($class, array $datas) {
		if ($datas === null) {
			return null;
		}

		$obs = [];
		foreach ($datas as $data) {
			$obs[] = static::createFromArray($class, $data);
		}

		return $obs;
	}

	/**
	 * binds $obj with data provided by $data
	 * @requires $obj neq null /\ $data neq null
	 * @modifies $obj
	 */
	public static function bind(&$ob, array $data) {
		if (property_exists($ob, 'fillable') && $ob->fillable) {
			foreach ($ob->fillable as $att) {
				if (array_key_exists($att, $data)) {
					$ob->{$att} = $data[$att];
				}
			}
		} else {
			if (property_exists($ob, 'protected') && $ob->protected) {
				$data = array_diff_key($data, array_flip($ob->protected));
			}
			foreach ($data as $att => $value) {
				if (property_exists($ob, $att)) {
					$ob->{$att} = $value;
				}
			}	
		}
	}
}