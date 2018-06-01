<?php namespace norsys\score\tests\units\composer\autoload;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\autoload, composer\part\container\fifo };
use mock\norsys\score as mockOfScore;

class prod extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$type = new mockOfScore\composer\autoload\type,
					$otherType = new mockOfScore\composer\autoload\type
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($type, $otherType))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new autoload, new fifo($type, $otherType))
							->once
		;
	}
}
