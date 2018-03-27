<?php namespace norsys\score\tests\units\composer\autoload\classmap\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\filename;
use mock\norsys\score as mockOfScore;

class directory extends filename
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
				$this->providerHasString($filename, $filenameAsString = uniqid())
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

				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid())
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
