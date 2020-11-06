<?php

namespace idiacant\dummyspam\interfaces;


interface SanitizerInterface
{
	public function Sanitize(string $message) : string;
}