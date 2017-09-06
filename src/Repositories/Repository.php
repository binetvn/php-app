<?php

namespace BiNet\App\Repositories;

abstract class Repository implements Contracts\IRepository {
	public function findOrFail($id)  {
		$record = $this->find($id);

		if ($record) {
			return $record;
		}

		throw new NotFoundException(static::class.".findOrFail(): record with id='$id' does not exist.");
	}
}