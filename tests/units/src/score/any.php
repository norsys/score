<?php namespace norsys\score\tests\units\score;

require __DIR__ . '/../../runner.php';

use norsys\score\{ tests\units, composer, serializer\keyValue as serializer };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\score')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$part = new mockOfScore\score\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part))
				->mock($serializer)
					->receive('objectToSerializeIs')
						->withArguments(new serializer\part\container\fifo($part))
							->once
		;
	}
}
