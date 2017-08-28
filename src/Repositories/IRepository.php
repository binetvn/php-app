<?php

namespace BiNet\Core\Repositories;

interface IRepository {
	public function findByID($id);
	public function findAll();
	
	public function save(Entity $entity);
}