<?php

namespace BiNet\App\Support\Contracts;

interface ICollection extends ArrayAccess {
	/**
	 * @return array  keys of collection items
	 */
	public function keys();

	/**
	 * @return bool  whether $key exists
	 */
	public function containKey(mixed $key);

	/**
	 * remove item(s) from collection specified by $key(s)
	 * @param  string|array  $keys
     * @return $this
	 */
	public function removeKeys($keys);

	/**
	 * get an item from collection by $key
	 * @param  mixed  $key     
	 * @param  mixed  $default 
	 * @return mixed          
	 */
	public function get($key, $default = null);
}