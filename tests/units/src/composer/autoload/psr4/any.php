<?php namespace norsys\score\tests\units\composer\autoload\psr4;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\serializer\keyValue\part\container\fifo;
use norsys\score\composer\part\name\autoload\psr4;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$mapping = new mockOfScore\composer\autoload\psr4\mapping,
					$otherMapping = new mockOfScore\composer\autoload\psr4\mapping
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($mapping, $otherMapping))
				->mock($serializer)
					->receive('objectToSerializeWithNameIs')
						->withArguments(new psr4, new fifo($mapping, $otherMapping))
							->once
		;
	}
}
