<?php

namespace BiNet\App\Repositories;

use BiNet\App\Entities\Entity;
use BiNet\App\Exceptions\NotFoundException;
use BiNet\App\Exceptions\NotSupportedException;
use BiNet\App\Repositories\Contracts\IRepository;

abstract class Repository implements IRepository {
	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	public function find($pk) {
		throw new NotSupportedException();
	}

	public function findOrFail($pk)  {
		$record = $this->find($pk);

		if ($record) {
			return $record;
		}

		throw new NotFoundException(static::class.".findOrFail(): record with primary-key='$pk' does not exist.");
	}

	public function findAll() {
		throw new NotSupportedException();
	}

	public function save(Entity $entity) {
		$class = get_class($entity);
		$now = new \DateTime();

		if ($entity->isNewRecord()) {
			// if createdAt
			if (property_exists($class, static::CREATED_AT)){
				$entity->{static::CREATED_AT} = $now;
				$entity->{static::UPDATED_AT} = $now;
			}
			return $this->insert($entity);
		}
		// updatedAt
		if (property_exists($class, static::UPDATED_AT)){
			$entity->{static::UPDATED_AT} = $now;
		}
		return $this->update($entity);
	}

	public function delete($pk) {
		throw new NotSupportedException();
	}

	protected function insert(Entity $entity) {
		throw new NotSupportedException();
	}
	protected function update(Entity $entity) {
		throw new NotSupportedException();
	}
}