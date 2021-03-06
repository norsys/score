<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
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
					$prefix = new mockOfScore\composer\autoload\psr4\mapping\prefix,
					$path = new mockOfScore\composer\fs\path
				),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix, $path))
				->mock($serializer)
					->receive('partToSerializeWithNameIs')
						->withArguments($prefix, $path)
							->once
		;
	}
}
