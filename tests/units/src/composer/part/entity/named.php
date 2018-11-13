<?php namespace norsys\score\tests\units\composer\part\entity;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class named extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part\entity')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\part\name,
					$part = new mockOfScore\composer\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $part))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments($name, $part)
							->once
		;
	}
}
