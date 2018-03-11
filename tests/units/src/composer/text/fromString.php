<?php namespace norsys\score\tests\units\composer\text;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\text };
use mock\norsys\score as mockOfScore;

class fromString extends units\test
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
				$this->newTestedInstance($name = new mockOfScore\composer\part\name, $string = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $string))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments($name, new text\any($string))
							->once
		;
	}
}
