<?php namespace norsys\score\tests\units\composer\required;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part\object')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($container = new mockOfScore\composer\depedency\container),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new name\required, $container)
							->once
		;
	}
}
