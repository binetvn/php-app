<?php

namespace BiNet\App\Repositories\Contracts;

use BiNet\App\Entities\Entity;

interface IRepository {
	public function findByID($id);
	public function findAll();
	
	public function save(Entity $entity);
}