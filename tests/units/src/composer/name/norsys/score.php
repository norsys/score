<?php namespace norsys\score\tests\units\composer\name\norsys;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\name, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class score extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\score\part')
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
						->withArguments(new name, new text('norsys/score'))
							->once
		;
	}
}
