<?php namespace norsys\score\tests\units\composer\config;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use norsys\score\composer\{ part\name, part };
use mock\norsys\score as mockOfScore;

class any extends units\test
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
					$option = new mockOfScore\composer\config\option,
					$otherOption = new mockOfScore\composer\config\option
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($option, $otherOption))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new name\config, new part\container\fifo($option, $otherOption))
							->once
		;
	}
}
