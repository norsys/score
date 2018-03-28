<?php namespace norsys\score\tests\units\fs\path\filename\container;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\filename\container')
		;
	}

	function testBlockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$block = new mockOfScore\container\iterator\block,
				$this->calling($block)->containerIteratorHasValue = function($anIterator, $aValue) use (& $filenames) {
					$filenames[] = $aValue;
				}
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->variable($filenames)
					->isNull

			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\fs\path\filename,
					$otherFilename = new mockOfScore\fs\path\filename,
					$anOtherFilename = new mockOfScore\fs\path\filename
				)
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->array($filenames)
					->isEqualTo([ $filename, $otherFilename, $anOtherFilename ])
		;
	}

	function testRecipientOfFsPathFilenameInContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\fs\path\filename\container\filename\recipient
			)
			->if(
				$this->testedInstance->recipientOfFsPathFilenameInContainerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('fsPathFilenameInContainerAre')
						->withArguments(... [])
							->once

			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\fs\path\filename,
					$otherFilename = new mockOfScore\fs\path\filename,
					$anOtherFilename = new mockOfScore\fs\path\filename
				)
			)
			->if(
				$this->testedInstance->recipientOfFsPathFilenameInContainerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('fsPathFilenameInContainerAre')
						->withArguments($filename, $otherFilename, $anOtherFilename)
							->once
		;
	}
}
