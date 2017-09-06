<?php

namespace BiNet\App\Validators\Contracts;

interface IValidator {
	/**
	 * [validate description]
	 * @param  [BiNet\App\Support\Container] $data  [associative array of attribute & data values]
	 * @param  [Array] $rules [associative array of attribute & validation rules]
	 * @return [boolean]      [return whether data satisfies with defined rules]
	 */
	public function validate($data, $rules);

	/**
	 * returns validation errors (if exist) from the previous invocation IValidator#validate($data, $rules)  
	 * @return [BiNet\App\Support\Container] [container of attribute & container of validation errors]
	 */
	public function errors();
}