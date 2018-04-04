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
					$path = new mockOfScore\composer\fs\path
				),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($serializer)
					->receive('partToSerializeWithNameIs')
						->withArguments(new fallback, $path)
							->once
		;
	}
}
