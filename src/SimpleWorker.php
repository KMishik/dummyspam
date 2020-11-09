<?php

namespace idiacant\dummyspam;


use idiacant\dummyspam\interfaces\CheckerInterface;
use idiacant\dummyspam\interfaces\NormalizerInterface;
use idiacant\dummyspam\interfaces\SanitizerInterface;

class SimpleWorker implements SanitizerInterface, NormalizerInterface, CheckerInterface
{

	public function CheckOnPatterns(string $message, array $patterns = [], array $glyphs = []): array
	{
		$result = [false, ''];
		foreach ($patterns as $pattern) {
			$currentPattern = $this->Sanitize($pattern);
			$currentPattern = $this->Normalize($currentPattern, $glyphs);
			$isFind = strpos($message, $currentPattern);
			if ($isFind !== false) {
				return [$isFind, $pattern];
			}
		}
		return $result;

	}

	public function Normalize(string $message, array $glyphs = []): string
	{
		$result = $message;
		$result = mb_strtolower($result, 'UTF-8');
		$result = strtr($result, $glyphs);
		return $result;
	}

	public function Sanitize(string $message): string
	{
		$result = $message;
		$result = preg_replace('#([^а-яА-Яa-zA-Z0-9\@]+)#u', '', $result);

		return $result;
	}
}