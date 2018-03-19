<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\container;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class infinite extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$mapping = new mockOfScore\composer\autoload\psr4\mapping,
					$otherMapping = new mockOfScore\composer\autoload\psr4\mapping
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($mapping, $otherMapping))
				->mock($mapping)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
				->mock($otherMapping)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
		;
	}
}
