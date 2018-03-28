<?php namespace norsys\score\tests\units\fs\path\filename\container\filename\recipient;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\filename\container\filename\recipient')
		;
	}

	function testFsPathFilenameInContainerAre()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$filename = new mockOfScore\fs\path\filename,
				$otherFilename = new mockOfScore\fs\path\filename
			)
			->if(
				$this->testedInstance->fsPathFilenameInContainerAre($filename, $otherFilename)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $filename, $otherFilename ])
		;
	}
}
