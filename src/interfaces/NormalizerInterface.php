<?php

namespace idiacant\dummyspam\interfaces;


interface NormalizerInterface
{
	public function Normalize(string $message, array $glyphs = []) : string;

}