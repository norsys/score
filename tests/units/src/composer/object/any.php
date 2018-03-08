<?php namespace norsys\score\tests\units\composer\object;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\object')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($key = uniqid(), $part = new mockOfScore\serializer\keyValue\part),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($key, $part))
				->mock($serializer)
					->receive('objectToSerializeAtKeyIs')
						->withArguments($key, $part)
							->once
		;
	}
}
