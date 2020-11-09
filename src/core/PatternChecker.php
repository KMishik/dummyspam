<?php
/**
 * Created by PhpStorm.
 * User: Misha
 * Date: 06.11.2020
 * Time: 19:05
 */

namespace idiacant\dummyspam\core;


use idiacant\dummyspam\interfaces\CheckerInterface;

class PatternChecker implements CheckerInterface
{
	public function CheckOnPatterns(string $message, array $patterns = [], array $glyphs = []): array
	{
		// TODO: Implement CheckOnPatterns() method.

		return [false, ""];
	}
}