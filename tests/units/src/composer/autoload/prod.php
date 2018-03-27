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
					$part = new mockOfScore\composer\part,
					$otherPart = new mockOfScore\composer\part,
					$anOtherPart = new mockOfScore\composer\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part, $otherPart, $anOtherPart))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new autoload, new fifo($part, $otherPart, $anOtherPart))
							->once
		;
	}
}
