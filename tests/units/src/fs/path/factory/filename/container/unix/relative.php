<?php namespace norsys\score\tests\units\fs\path\factory\filename\container\unix;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\fs\path;
use mock\norsys\score as mockOfScore;

class relative extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\factory\filename\container')
		;
	}

	function testRecipientOfFsPathWithFsPathFilenameFromContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$container = new mockOfScore\fs\path\filename\container,
				$recipient = new mockOfScore\fs\path\recipient
			)
			->if(
				$this->testedInstance->recipientOfFsPathWithFsPathFilenameFromContainerIs($container, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('fsPathIs')
						->withArguments(new path\unix\relative($container))
							->once
		;
	}
}
