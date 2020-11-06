<?php

namespace idiacant\dummyspam;

use idiacant\dummyspam\interfaces\GraphenesInterface;
use idiacant\dummyspam\interfaces\PatternsInterface;

class DummySpam
{
	public $glyphs;
	public $patterns;

	private $message;

	private function setMessage(string $message) {

		$this->message = $message;

	}


	public function __construct(GraphenesInterface $graphene, PatternsInterface $pattern, string $message )
	{
		$this->glyphs = $graphene::getGlyphs();
		$this->patternSet = $pattern::getPatterns();
		$this->setMessage($message);
	}


	public function getMessage() : string {

		return $this->message;

	}
}
