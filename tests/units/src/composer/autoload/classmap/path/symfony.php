<?php namespace norsys\score\tests\units\composer\autoload\classmap\path;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\path;
use norsys\score\composer;
use mock\norsys\score as mockOfScore;

class symfony extends path
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
					->receive('textToSerializeIs')
						->withArguments(new composer\part\text\any('./app/AppKernel.php'))
							->once
						->withArguments(new composer\part\text\any('./app/AppCache.php'))
							->once
		;
	}
}
