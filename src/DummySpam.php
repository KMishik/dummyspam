<?php

namespace idiacant\dummyspam;

use idiacant\dummyspam\interfaces\CheckerInterface;
use idiacant\dummyspam\interfaces\GraphenesInterface;
use idiacant\dummyspam\interfaces\NormalizerInterface;
use idiacant\dummyspam\interfaces\PatternsInterface;
use idiacant\dummyspam\interfaces\SanitizerInterface;

class DummySpam
{
	public $glyphs;
	public $patterns;

	private $message;
	private $origMessage;
	private $sanitizer;
	private $normalizer;
	private $checker;

	private function setMessage(string $message) {

		$this->origMessage = $message;
		$this->message = trim($message);

	}

	protected function msgSanitize() {

		$this->message = $this->sanitizer->Sanitize($this->message);

	}

	protected function msgNormalize() {

		//strtolower
		//strtr
		$this->message = $this->normalizer->Normalize($this->message, $this->glyphs);

	}

	protected function findPatterns() : array {

		//strpos

		$result = $this->checker->CheckOnPatterns($this->message, $this->patterns);

		return $result;

	}

	public function __construct(GraphenesInterface $graphene, PatternsInterface $pattern,
															SanitizerInterface $sanitizer, NormalizerInterface $normalizer,
															CheckerInterface $checker, $message )
	{
		$this->glyphs = $graphene::getGlyphs();
		$this->patternSet = $pattern::getPatterns();
		$this->sanitizer = $sanitizer;
		$this->normalizer = $normalizer;
		$this->checker = $checker;
		$this->setMessage($message);
	}


	public function getMessage() : array {

		return ["orign" => $this->origMessage, "processed" => $this->message];

	}

	public function checkIsSpam() : array {

		$result = [true, "Validations didn't start."];

		try {
				$this->msgSanitize();
				$this->msgNormalize();
				$result = $this->findPatterns();
		} catch (\Exception $e) {
				$result = [true, "Exception error: " . $e->getMessage()];
		}

		return $result;
	}
}
