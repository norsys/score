<?php namespace norsys\score\tests\units\composer\type;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\type')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($type = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($type))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name\type, new text($type))
							->once
		;
	}
}
