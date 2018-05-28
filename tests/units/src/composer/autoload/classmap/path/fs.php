<?php namespace norsys\score\tests\units\composer\autoload\classmap\path;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\composer;
use mock\norsys\score as mockOfScore;

class fs extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\classmap\path')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\fs\path
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($serializer)
					->receive('textToSerializeIs')
						->never

			->given(
				$pathAsString = uniqid(),
				$this->calling($path)->recipientOfStringIs = function($recipient) use ($pathAsString) {
					$recipient->stringIs($pathAsString);
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new composer\part\text\any($pathAsString))
							->once
		;
	}
}
