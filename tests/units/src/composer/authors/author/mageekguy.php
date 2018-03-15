<?php namespace norsys\score\tests\units\composer\authors\author;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units\composer\authors\author as test, serializer\keyValue as serializer, composer\part\name, composer\authors\author };
use mock\norsys\score as mockOfScore;

class mageekguy extends test
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
					->receive('objectInJsonArrayIs')
						->withArguments(
							new serializer\part\container\fifo(
								new author\name\any('Frédéric Hardy'),
								new author\email\any('frederic.hardy@mageekbox.net'),
								new author\homepage\any('http://blog.mageekbox.net'),
								new author\role\developer
							)
						)
							->once
		;
	}
}
