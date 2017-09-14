<?php

namespace BiNet\App\Repositories\Contracts;

use BiNet\App\Entities\Entity;

interface IRepository {
	public function find($id);
	/**
	 * finds the return specified by $id & returns
	 * throw Exceptions\NotFoundException if not exist
	 * @param  [type] $id [description]
	 */
	public function findOrFail($id);
	public function findAll();

	public function save(Entity $entity);
	/**
	 * deletes the record specified by $id and 
	 * returns whether success or not
	 * @param  int/string  $id 
	 */
	public function delete($id);
}