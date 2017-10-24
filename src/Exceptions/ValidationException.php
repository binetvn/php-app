<?php

namespace BiNet\App\Exceptions;

class ValidationException extends \Exception {
	private $errors;

	public function __construct($errors = null, $message = 'ValidationException', $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);

        $this->errors = $errors;
    }

    public function getErrors() {
    	return $this->errors;
    }
}