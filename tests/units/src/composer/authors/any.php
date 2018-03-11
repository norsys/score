<?php namespace norsys\score\tests\units\composer\authors;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue as serializer, composer\part\name\authors };
use mock\norsys\score as mockOfScore;

class any extends units\test
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
				$this->newTestedInstance($author = new mockOfScore\composer\authors\author),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($author))
				->mock($serializer)
					->receive('arrayToSerializeWithNameIs')
						->withArguments(new authors, new serializer\part\container\fifo($author))
							->once
		;
	}
}
