<?php namespace norsys\score\tests\units\fs\path\unix\relative;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\fs\path;
use mock\norsys\score as mockOfScore;

class filename extends path
{
	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\fs\path\filename,
					$otherFilename = new mockOfScore\fs\path\filename,
					$anOtherFilename = new mockOfScore\fs\path\filename
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid()),
				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid()),
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('./' . $filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}
}
