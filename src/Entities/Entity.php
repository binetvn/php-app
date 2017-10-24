<?php

namespace BiNet\App\Entities;

use BiNet\App\Support\Traits\JsonableTrait;

/**
 * Note: primary key field must be declare as protected
 */
abstract class Entity {
	protected $primaryKey = 'id';
	protected $fillable;
	protected $protected;
	
	public function id() {
		return $this->{$this->primaryKey};
	}

	/**
	 * return whether this is new record
	 */
	public function isNewRecord() {
		return $this->id() ? false : true;
	}

	/**
	 * validate whether $this violates any domain constraints
	 * throws NotPossibleException if any
	 */
	public function repOK() {
		if ($this->fillable && $this->protected) {
			throw new NotPossibleException(static::class.': use fillable or protected only, not both.');
		}
	}
}