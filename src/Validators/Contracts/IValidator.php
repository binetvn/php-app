<?php

namespace BiNet\App\Validators\Contracts;

interface IValidator {
	/**
	 * returns whether data satisfies with defined validation rules
	 * i.e.
	 * $data = [
	 * 	'title' => 'This is a title value',
	 * ]
	 * $rules = [
	 * 	'title' => ['required', 'max'=>70]
	 * ]
	 * @param  array $data  attribute & data values
	 * @param  array  $rules  attribute & validation rules
	 * @return bool 
	 */
	public function validate(array $data, array $rules);
	
	/**
	 * @see #validate(array, array)
	 * if data not validated
	 * 	throws BiNet\App\Exceptions\ValidationException
	 */
	public function validateOrFail(array $data, array $rules);

	/**
	 * returns validation errors (if exist) from the previous invocation IValidator#validate($data, $rules) 
	 * i.e. [
	 * 	'title' => [
	 * 		'The title is required.',
	 * 		'The title is too length (max: 70)'
	 * 	]
	 * ]
	 * @return array  attributes & validation errors
	 */
	public function getErrors();
}