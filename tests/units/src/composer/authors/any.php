<?php namespace norsys\score\tests\units\composer\authors;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

use norsys\score\serializer\{
	keyValue\part\anArray,
	keyValue\part\container
};

use norsys\score\composer\part\name\authors;

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
					->receive('partToSerializeWithNameIs')
						->withArguments(new authors, new anArray(new container\fifo($author)))
							->once
		;
	}
}
