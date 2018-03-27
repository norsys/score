<?php namespace norsys\score\tests\units\composer\autoload\classmap\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class file extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\classmap\filename')
		;
	}

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
				$filenameAsString = uniqid(),
				$this->calling($filename)->recipientOfStringIs = function($aRecipient) use ($filenameAsString) {
					$aRecipient->stringIs($filenameAsString);
				},

				$otherFilenameAsString = uniqid(),
				$this->calling($otherFilename)->recipientOfStringIs = function($aRecipient) use ($otherFilenameAsString) {
					$aRecipient->stringIs($otherFilenameAsString);
				},

				$anOtherFilenameAsString = uniqid(),
				$this->calling($anOtherFilename)->recipientOfStringIs = function($aRecipient) use ($anOtherFilenameAsString) {
					$aRecipient->stringIs($anOtherFilenameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}
}
