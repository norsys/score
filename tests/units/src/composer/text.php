<?php namespace norsys\score\tests\units\composer;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class text extends units\test
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
				$this->newTestedInstance($name = new mockOfScore\composer\part\name, $text = new mockOfScore\composer\part\text),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $text))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments($name, $text)
							->once
		;
	}
}
