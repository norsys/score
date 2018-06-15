<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\fallback\directory;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\{
	tests\units,
	composer\autoload\psr4\mapping\prefix\fallback,
	composer\fs\path
};
use mock\norsys\score as mockOfScore;

class src extends units\test
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
						->withArguments(new fallback, new path\directory\src)
							->once
		;
	}
}
