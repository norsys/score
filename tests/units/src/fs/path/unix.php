<?php namespace norsys\score\tests\units\fs\path;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\fs\path;
use mock\norsys\score as mockOfScore;

class unix extends path
{
	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$container = new mockOfScore\fs\path\filename\container
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$filename = new mockOfScore\fs\path\filename,
				$otherFilename = new mockOfScore\fs\path\filename,
				$this->providerHasString($anOtherFilename = new mockOfScore\fs\path\filename, $anOtherFilenameAsString = uniqid()),

				$this->calling($container)->blockForContainerIteratorIs = function($aBlock) use ($filename, $otherFilename, $anOtherFilename) {
					$aBlock->containerIteratorHasValue(new mockOfScore\container\iterator, $filename);
					$aBlock->containerIteratorHasValue(new mockOfScore\container\iterator, $otherFilename);
					$aBlock->containerIteratorHasValue(new mockOfScore\container\iterator, $anOtherFilename);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('/' . $anOtherFilenameAsString)
							->once

			->given(
				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('/' . $filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}

	function testRecipientOfFilenameContainerFromFsPathIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$container = new mockOfScore\fs\path\filename\container
				),
				$recipient = new mockOfScore\fs\path\filename\container\recipient
			)
			->if(
				$this->testedInstance->recipientOfFilenameContainerFromFsPathIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('fsPathFilenameContainerIs')
						->withArguments($container)
							->once
		;
	}
}
