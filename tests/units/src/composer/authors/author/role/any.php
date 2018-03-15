<?php namespace norsys\score\tests\units\composer\authors\author\role;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\author\role, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author\role')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($role = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($role))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new role, new text($role))
							->once
		;
	}
}
