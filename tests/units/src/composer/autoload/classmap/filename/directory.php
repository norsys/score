<?php namespace norsys\score\tests\units\composer\autoload\classmap\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class directory extends units\test
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
					$filename = new mockOfScore\fs\path\filename
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$filenameAsString = uniqid(),
				$this->calling($filename)->recipientOfStringIs = function($aRecipient) use ($filenameAsString) {
					$aRecipient->stringIs($filenameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($filenameAsString . '/')
							->once


			->given(
				$this->newTestedInstance(
					$filename,
					$otherFilename = new mockOfScore\fs\path\filename
				),

				$otherFilenameAsString = uniqid(),
				$this->calling($otherFilename)->recipientOfStringIs = function($aRecipient) use ($otherFilenameAsString) {
					$aRecipient->stringIs($otherFilenameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($filenameAsString . '/' . $otherFilenameAsString . '/')
							->once
		;
	}
}
