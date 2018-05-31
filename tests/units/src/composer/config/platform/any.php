<?php namespace norsys\score\tests\units\composer\config\platform;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\config\option\platform\constraint, composer\part\name, composer\part };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\option')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$constraint = new mockOfScore\composer\config\platform\constraint,
					$otherConstraint = new mockOfScore\composer\config\platform\constraint
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($constraint, $otherConstraint))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new name\config\platform, new part\container\fifo($constraint, $otherConstraint))
							->once
		;
	}
}
