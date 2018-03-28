<?php namespace norsys\score\tests\units\fs\path\filename\container\operator;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\{ tests\units, fs\path\filename\container };
use mock\norsys\score as mockOfScore;

class append extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\filename\container\operator')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new container\factory\fifo));
	}

	function testRecipientOfOperationWithContainerAndContainerOfFsPathFilenameIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$factory = new mockOfScore\fs\path\filename\container\factory
				),
				$container = new mockOfScore\fs\path\filename\container,
				$otherContainer = new mockOfScore\fs\path\filename\container,
				$recipient = new mockOfScore\fs\path\filename\container\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs($container, $otherContainer, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory))
				->mock($recipient)
					->receive('fsPathFilenameContainerIs')
						->never

			->given(
				$filenameFromContainer = new mockOfScore\fs\path\filename,
				$this->calling($container)->recipientOfFsPathFilenameInContainerIs = function($aRecipient) use ($filenameFromContainer) {
					$aRecipient->fsPathFilenameInContainerAre($filenameFromContainer);
				},

				$filenameFromOtherContainer = new mockOfScore\fs\path\filename,
				$this->calling($otherContainer)->recipientOfFsPathFilenameInContainerIs = function($aRecipient) use ($filenameFromOtherContainer) {
					$aRecipient->fsPathFilenameInContainerAre($filenameFromOtherContainer);
				},

				$containerWithFilenamesAppended = new mockOfScore\fs\path\filename\container,
				$this->calling($factory)->filenamesToBuildContainerOfFsPathFilenameForRecipientAre = function($aRecipient, ... $someFilenames) use ($filenameFromContainer, $filenameFromOtherContainer, $containerWithFilenamesAppended) {
					if ($someFilenames == [ $filenameFromContainer, $filenameFromOtherContainer ])
					{
						$aRecipient->fsPathFilenameContainerIs($containerWithFilenamesAppended);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs($container, $otherContainer, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory))
				->mock($recipient)
					->receive('fsPathFilenameContainerIs')
						->withArguments($containerWithFilenamesAppended)
							->once
		;
	}
}
