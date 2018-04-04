<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\norsys;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\composer\{ autoload\psr4\mapping\prefix, fs\path\directory\src };
use mock\norsys\score as mockOfScore;

class score extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($serializer)
					->receive('partToSerializeWithNameIs')
						->withArguments(new prefix\norsys\score, new src)
							->once
		;
	}
}
