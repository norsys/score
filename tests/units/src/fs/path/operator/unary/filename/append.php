<?php namespace norsys\score\tests\units\fs\path\operator\unary\filename;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\fs\path;
use norsys\score\fs\path\filename\container\operator;
use norsys\score\fs\path\operator\unary\filename;
use mock\norsys\score as mockOfScore;

class append extends units\test
{
	function test__construct()
	{
		$this
			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\fs\path,
					$factory = new mockOfScore\fs\path\factory\filename\container
				),
				$otherPath = new mockOfScore\fs\path,

				$recipient = new mockOfScore\fs\path\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithFsPathIs($otherPath, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $factory))
				->mock($factory)
					->receive('recipientOfFsPathWithFsPathFilenameFromContainerIs')
						->never

			->given(
				$containerFromPath = new path\filename\container\fifo(
					$filenameFromPath = new mockOfScore\fs\path\filename
				),
				$this->calling($path)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($containerFromPath) {
					$aRecipient->fsPathFilenameContainerIs($containerFromPath);
				},

				$containerFromOtherPath = new path\filename\container\fifo(
					$filenameFromOtherPath = new mockOfScore\fs\path\filename
				),
				$this->calling($otherPath)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($containerFromOtherPath) {
					$aRecipient->fsPathFilenameContainerIs($containerFromOtherPath);
				}
			)
			->if(
				$this->testedInstance->recipientOfOperationWithFsPathIs($otherPath, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $factory))
				->mock($factory)
					->receive('recipientOfFsPathWithFsPathFilenameFromContainerIs')
						->withArguments(new path\filename\container\fifo($filenameFromPath, $filenameFromOtherPath))
							->once
		;
	}
}
