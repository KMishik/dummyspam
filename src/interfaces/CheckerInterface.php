<?php

namespace idiacant\dummyspam\interfaces;


interface CheckerInterface
{
	public function CheckOnPatterns(string $message, array $patterns = []) : array;

}