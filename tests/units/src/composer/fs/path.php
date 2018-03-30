<?php namespace norsys\score\tests\units\composer\fs;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\fs;
use mock\norsys\score as mockOfScore;

class path extends fs\path
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
					->withArguments('./' . $anOtherFilenameAsString)
							->once

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid()),
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
					->withArguments('./' . $filenameAsString . '/' . $anOtherFilenameAsString)
							->once

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
