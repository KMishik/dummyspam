<?php
/**
 * Created by PhpStorm.
 * User: Misha
 * Date: 06.11.2020
 * Time: 19:05
 */

namespace idiacant\dummyspam\core;


use idiacant\dummyspam\interfaces\NormalizerInterface;

class Normalizer implements NormalizerInterface
{
	public function Normalize(string $message, array $glyphs = []): string
	{
		// TODO: Implement Normalize() method.

		return $message;
	}
}