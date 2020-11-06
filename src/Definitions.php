<?php

namespace idiacant\dummyspam;
use idiacant\dummyspam\interfaces\GraphenesInterface;
use idiacant\dummyspam\interfaces\PatternsInterface;

final class Definitions implements GraphenesInterface, PatternsInterface
{
	private static $GLIPHS = [
		"a" => "а",
		"o" => "о",
		"k" => "к",
		"c" => "с",
		"p" => "р",
		"m" => "м",
		"y" => "у",
		"x" => "х",
	];

	private static $PATTERNS = [

	];

	final private function __construct()
	{
	}

	final private function __clone()
	{
	}

	public static function getGlyphs() : array {
		return self::$GLIPHS;
	}

	public static function getPatterns() : array {
		return self::$PATTERNS;
	}
}