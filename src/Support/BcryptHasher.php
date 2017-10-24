<?php

namespace BiNet\App\Support;

use BiNet\App\Support\Contracts\IHasher;

class BcryptHasher implements IHasher {

	public function hash($str)
	{
		return password_hash($str, PASSWORD_BCRYPT);
	}

	public function check($str, $hashed)
	{
		return password_verify($str, $hashed);
	}
}