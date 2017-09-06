<?php

namespace BiNet\App\Repositories;

use BiNet\App\Repositories\Contracts\IRepository;

abstract class Repository implements IRepository {
	public function findOrFail($id)  {
		$record = $this->find($id);

		if ($record) {
			return $record;
		}

		throw new NotFoundException(static::class.".findOrFail(): record with id='$id' does not exist.");
	}
}