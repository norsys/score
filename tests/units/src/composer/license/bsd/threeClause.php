<?php namespace norsys\score\tests\units\composer\license\bsd;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\text\any as text, composer\part\name };
use mock\norsys\score as mockOfScore;

class threeClause extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\license')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($license = uniqid()),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($license))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name\license, new text('BSD-3-Clause'))
							->once
		;
	}
}
