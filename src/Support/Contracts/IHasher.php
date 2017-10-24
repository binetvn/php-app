<?php

namespace BiNet\App\Support\Contracts;

interface IHasher {
	/**
	 * @param  string $str  string for hashing
	 * @return string  		hashed string
	 */
	public function hash($str);

	/**
	 * returns whether hashed $str match with $hashed
	 */
	public function check($str, $hashed);
}