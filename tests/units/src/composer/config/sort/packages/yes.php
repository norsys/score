<?php namespace norsys\score\tests\units\composer\config\sort\packages;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\part\text };
use mock\norsys\score as mockOfScore;

class yes extends units\test
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
						->withArguments(new name\config\sort\packages, new text\yes)
							->once
		;
	}
}
