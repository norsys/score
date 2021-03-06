<?php namespace norsys\score\tests\units\composer\autoload\classmap;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{
	tests\units,
	composer\part\name\autoload\classmap,
	serializer\keyValue\part\container
};

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
					$path = new mockOfScore\composer\fs\path,
					$otherPath = new mockOfScore\composer\fs\path,
					$anOtherPath = new mockOfScore\composer\fs\path
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
						->withArguments(new classmap, new container\fifo($path, $otherPath, $anOtherPath))
							->once
		;
	}
}
