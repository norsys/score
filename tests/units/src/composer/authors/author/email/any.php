<?php namespace norsys\score\tests\units\composer\authors\author\email;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\author\email, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author\email')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($email = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($email))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new email, new text($email))
							->once
		;
	}
}
