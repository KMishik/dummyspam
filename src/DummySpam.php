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

		$this->message = $this->normalizer->Normalize($this->message, $this->glyphs);

	}

	protected function findPatterns() : array {

		$result = $this->checker->CheckOnPatterns($this->message, $this->patterns, $this->glyphs);

		return $result;

	}

	public function __construct(GraphenesInterface $Graphener, PatternsInterface $Patterner,
															SanitizerInterface $Sanitizer, NormalizerInterface $Normalizer,
															CheckerInterface $Checker)
	{
		$this->glyphs = $Graphener::getGlyphs();
		$this->patterns = $Patterner::getPatterns();
		$this->sanitizer = $Sanitizer;
		$this->normalizer = $Normalizer;
		$this->checker = $Checker;
	}


	public function getMessage() : array {

		return ["orign" => $this->origMessage, "processed" => $this->message];

	}

	public function checkIsSpam(string $message = '') : array {

		$this->setMessage($message);

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
