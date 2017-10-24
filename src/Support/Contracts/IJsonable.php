<?php

namespace BiNet\App\Support\Contracts;

interface IJsonable extends \JsonSerializable {
	public function toJson();
}