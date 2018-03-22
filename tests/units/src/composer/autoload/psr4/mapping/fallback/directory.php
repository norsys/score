<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\fallback;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\{ tests\units, composer\autoload\psr4\mapping\prefix\fallback };
use mock\norsys\score as mockOfScore;

class directory extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$directory = new mockOfScore\composer\autoload\psr4\mapping\directory
				),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($directory))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new fallback, $directory)
							->once
		;
	}
}
