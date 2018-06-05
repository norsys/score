<?php namespace norsys\score\tests\units\composer\scripts;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\part\container\fifo };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\scripts')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$part = new mockOfScore\composer\scripts\part,
					$otherPart = new mockOfScore\composer\scripts\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part, $otherPart))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new name\scripts, new fifo($part, $otherPart))
							->once
		;
	}
}
