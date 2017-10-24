<?php

namespace BiNet\App\Validators;

use BiNet\App\Exceptions\ValidationException;
use BiNet\App\Validators\Contracts\IValidator;

abstract class Validator implements IValidator {
	public function validateOrFail(array $data, array $rules) {
		if ($this->validate($data, $rules)) {
			return true;
		}
		throw new ValidationException($this->getErrors(), 'Invalid data input.');
	}
}