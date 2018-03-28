<?php namespace norsys\score\tests\units\composer\autoload\classmap\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\filename;
use norsys\score\fs\path\filename\ext4NtfsHfsPlus;
use norsys\score\fs\path\unix;
use norsys\score\composer\autoload\classmap\filename\file;
use mock\norsys\score as mockOfScore;

class symfony extends filename
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
						->withArguments(new file(new unix\relative\filename(new ext4NtfsHfsPlus('app'), new ext4NtfsHfsPlus('Appkernel.php'))))
							->once
						->withArguments(new file(new unix\relative\filename(new ext4NtfsHfsPlus('app'), new ext4NtfsHfsPlus('AppCache.php'))))
							->once
		;
	}
}
