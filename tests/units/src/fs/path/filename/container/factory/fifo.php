<?php namespace norsys\score\tests\units\fs\path\filename\container\factory;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\{ tests\units, fs\path\filename\container };
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\filename\container\factory')
		;
	}

	function testFilenamesToBuildContainerOfFsPathFilenameFForRecipientAre()
	{
		$this
			->given(
				$this->newTestedInstance,
				$filename = new mockOfScore\fs\path\filename,
				$otherFilename = new mockOfScore\fs\path\filename,
				$recipient = new mockOfScore\fs\path\filename\container\recipient
			)
			->if(
				$this->testedInstance->filenamesToBuildContainerOfFsPathFilenameForRecipientAre($recipient, $filename, $otherFilename)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('fsPathFilenameContainerIs')
						->withArguments(new container\fifo($filename, $otherFilename))
							->once
		;
	}
}
