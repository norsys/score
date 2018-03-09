<?php namespace norsys\score\tests\units\composer\name;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\name, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\name')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($name = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name, new text($name))
							->once
		;
	}
}
