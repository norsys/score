<?php namespace norsys\score\tests\units\composer\authors\author\role;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units\composer\authors\author\role as test, composer\part\name\author\role, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class developer extends test
{
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
					->receive('textToSerializeWithNameIs')
						->withArguments(new role, new text('Developer'))
							->once
		;
	}
}
