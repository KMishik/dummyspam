<?php

namespace idiacant\dummyspam;


use idiacant\dummyspam\interfaces\CheckerInterface;
use idiacant\dummyspam\interfaces\NormalizerInterface;
use idiacant\dummyspam\interfaces\SanitizerInterface;

class SimpleWorker implements SanitizerInterface, NormalizerInterface, CheckerInterface
{

	public function CheckOnPatterns(string $message, array $patterns = []): array
	{
		// TODO: Implement CheckOnPatterns() method.
	}

	public function Normalize(string $message, array $glyphs = []): string
	{
		// TODO: Implement Normalize() method.
	}

	public function Sanitize(string $message): string
	{
		// TODO: Implement Sanitize() method.
	}
}