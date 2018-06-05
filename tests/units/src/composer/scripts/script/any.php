<?php namespace norsys\score\tests\units\composer\scripts\script;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\scripts\script')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($script = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($script))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new text\any($script))
							->once
		;
	}
}
