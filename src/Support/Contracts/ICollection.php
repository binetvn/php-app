<?php

namespace BiNet\App\Support\Contracts;

/**
 * @overview extends php array with utility functions
 */
interface ICollection extends \ArrayAccess, \Countable {
	/**
	 * return if this is empty
	 */
	public function isEmpty();

	/**
	 * return the number of items in this
	 * @alias count($this)
	 */
	public function size();

	/**
	 * @return array  keys of collection items
	 */
	public function keys();

	/**
	 * @return bool  whether $key exists
	 */
	public function containKey($key);

	/**
	 * add [$key=>$value] into this
	 * if $key already exists
	 * 	if existing associated value $old is an array 
	 * 		append $old with $value
	 * 	else 
	 * 		turn $old into array with $old & $value
	 */
	// public function add($key, $value);


	/**
	 * put an item in the collection by key.
	 * @return $this
	 */
	public function put($key, $value);

	/**
	 * push an item onto the end of the collection.
	 * @return $this
	 */
	public function push($value);

	/**
	 * get and remove an item from the collection.
	 */
	public function pull($key, $default = null);

	/**
	 * remove item(s) from collection specified by $key(s)
	 * @param  string|array  $keys
     * @return $this
	 */
	public function removeKeys($keys);

	/**
	 * return value for $key, $default if not exist
	 * @param  mixed  $key     
	 * @param  mixed  $default 
	 * @return mixed          
	 */
	public function get($key, $default = null);

	/**
	 * @see #get($key, $default)
	 * return value of first element from this
	 * if $key specified
	 * 	get $value for $key, $default if not exist;
	 *  in case of $value is an array, return its first element, $default if empty
	 */
	// public function first($key, $default = null);
}