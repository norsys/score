<?php namespace norsys\score\tests\units\composer\authors;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use norsys\score\composer\part\{ container\fifo, name\authors };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\root\part')
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
						->withArguments(new authors, new fifo($author))
							->once
		;
	}
}
