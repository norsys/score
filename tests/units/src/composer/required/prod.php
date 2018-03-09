<?php namespace norsys\score\tests\units\composer\required;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\depedency };
use mock\norsys\score as mockOfScore;

class prod extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\required')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency = new mockOfScore\composer\depedency,
					$otherDepedency = new mockOfScore\composer\depedency
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency, $otherDepedency))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new name\required, new depedency\container\infinite($depedency, $otherDepedency))
							->once
		;
	}
}
