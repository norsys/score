<?php namespace norsys\score\tests\units\fs\path\operator\unary\filename;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testRecipientOfOperationWithFsPathIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\fs\path,
					$factory = new mockOfScore\fs\path\factory\filename\container,
					$operator = new mockOfScore\fs\path\filename\container\operator
				),

				$otherPath = new mockOfScore\fs\path,

				$recipient = new mockOfScore\fs\path\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithFsPathIs($otherPath, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $factory, $operator))
				->mock($recipient)
					->receive('fsPathIs')
						->never

			->given(
				$containerFromPath = new mockOfScore\fs\path\filename\container,
				$this->calling($path)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($containerFromPath) {
					$aRecipient->fsPathFilenameContainerIs($containerFromPath);
				},

				$containerFromOtherPath = new mockOfScore\fs\path\filename\container,
				$this->calling($otherPath)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($containerFromOtherPath) {
					$aRecipient->fsPathFilenameContainerIs($containerFromOtherPath);
				},

				$containerFromOperator = new mockOfScore\fs\path\filename\container,
				$this->calling($operator)->recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs = function($aContainer, $anOtherContainer, $aRecipient) use ($containerFromPath, $containerFromOtherPath, $containerFromOperator) {
					if ($aContainer == $containerFromPath && $anOtherContainer == $containerFromOtherPath)
					{
						$aRecipient->fsPathFilenameContainerIs($containerFromOperator);
					}
				},

				$pathFromFactory = new mockOfScore\fs\path,
				$this->calling($factory)->recipientOfFsPathWithFsPathFilenameFromContainerIs = function($aContainer, $aRecipient) use ($containerFromOperator, $pathFromFactory) {
					if ($aContainer == $containerFromOperator)
					{
						$aRecipient->fsPathIs($pathFromFactory);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfOperationWithFsPathIs($otherPath, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $factory, $operator))
				->mock($recipient)
					->receive('fsPathIs')
						->withArguments($pathFromFactory)
							->once
		;
	}
}
