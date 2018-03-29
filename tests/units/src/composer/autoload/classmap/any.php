<?php namespace norsys\score\tests\units\composer\autoload\classmap;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\autoload\classmap, composer\part };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\classmap')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\composer\autoload\classmap\path,
					$otherPath = new mockOfScore\composer\autoload\classmap\path,
					$anOtherPath = new mockOfScore\composer\autoload\classmap\path
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $otherPath, $anOtherPath))
				->mock($serializer)
					->receive('arrayToSerializeWithNameIs')
						->withArguments(new classmap, new part\anArray\fifo($path, $otherPath, $anOtherPath))
							->once
		;
	}
}
