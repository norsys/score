<?php namespace norsys\score\tests\units\composer\description;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\description, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\description')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$description = uniqid()
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($description))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new description, new text($description))
							->once
		;
	}
}
