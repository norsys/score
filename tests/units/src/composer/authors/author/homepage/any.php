<?php namespace norsys\score\tests\units\composer\authors\author\homepage;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\author\homepage, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author\homepage')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($homepage = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($homepage))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new homepage, new text($homepage))
							->once
		;
	}
}
