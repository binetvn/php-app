<?php

namespace BiNet\App\Repositories\Contracts;

interface IUnitOfWork {
	public function beginTransaction();
	public function commit();
	public function rollback();
	public function executeCommand($command, $params = []);
}
