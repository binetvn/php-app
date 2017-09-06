<?php

namespace BiNet\App\Validators;

use BiNet\App\Validators\Contracts\IValidator;

abstract class Validator implements IValidator {
	public function validateOrFail($data, $rules) {
		if ($this->validate($data, $rules))
			return true;
		throw new ValidationException($this->errors(), 'Invalid data input.');
	}
}