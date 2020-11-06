<?php
/**
 * Created by PhpStorm.
 * User: Misha
 * Date: 06.11.2020
 * Time: 19:04
 */

namespace idiacant\dummyspam\core;


use idiacant\dummyspam\interfaces\SanitizerInterface;

class Sanitizer implements SanitizerInterface
{
	public function Sanitize(string $message): string
	{
		// TODO: Implement Sanitize() method.

		return $message;
	}
}