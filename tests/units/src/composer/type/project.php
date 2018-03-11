<?php namespace norsys\score\tests\units\composer\type;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class project extends units\test
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
				$this->newTestedInstance,
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name\type, new text('project'))
							->once
		;
	}
}
