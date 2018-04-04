<?php namespace norsys\score\tests\units\composer\authors\author;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\part\container\fifo };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($part = new mockOfScore\composer\part),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part))
				->mock($serializer)
					->receive('objectToSerializeInArrayIs')
						->withArguments(new fifo($part))
							->once

			->given(
				$this->newTestedInstance($part, $otherPart = new mockOfScore\composer\part)
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part, $otherPart))
				->mock($serializer)
					->receive('objectToSerializeInArrayIs')
						->withArguments(new fifo($part, $otherPart))
							->once
		;
	}
}
