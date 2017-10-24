<?php

namespace BiNet\App\Support;

use BiNet\App\Support\Contracts\IJsonable;
use BiNet\App\Support\Traits\JsonableTrait;

class AjaxResult implements IJsonable {
	use JsonableTrait;

	const META_COUNT = 'count';

	private $success; 	// true/ false
	private $message; 
	private $data;		// data if success/ errors
	private $meta;		// meta data (count, sum...)

	public function __construct($success = true, $message = null, $data = null, $meta = null) {
		$this->success = $success;
		$this->message = $message;
		$this->data = $data;

		if ($data instanceof \Countable) {
			if (!$meta) {
				$meta = [];
			}

			if (!isset($meta[static::META_COUNT])) {
				$meta[static::META_COUNT] = count($data);
			}
		}

		$this->meta = $meta;
	}

	public static function data($data, $meta=null, $success=true) {
    	return new self($success, null, $data, $meta);
    }

    public static function error($message=null) {
    	return new self(false, $message);
    }

    public static function success($message=null, $data=null, $meta=null) {
    	return new self(true, $message, $data, $meta);
    }

    // to consider for deleting
    public function withData($key, $value) {
    	if (!$this->data) {
    		$this->data = [];
    	}
    	$this->data[$key] = $value;

    	if ($value instanceof \Countable) {
    		if (!$this->meta) {
    			$this->meta = [];
    		}

    		$this->meta[$key][static::META_COUNT] = count($value);
    	}
    }
}