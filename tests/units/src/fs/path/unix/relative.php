<?php namespace norsys\score\tests\units\fs\path\unix;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units\fs\path;
use mock\norsys\score as mockOfScore;

class relative extends path
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
				$this->providerHasString($filename = new mockOfScore\fs\path\filename, $filenameAsString = uniqid()),
				$this->providerHasString($otherFilename = new mockOfScore\fs\path\filename, $otherFilenameAsString = uniqid()),
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
					->withArguments('./' . $filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}
}
