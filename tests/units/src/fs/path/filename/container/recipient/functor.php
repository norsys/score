<?php namespace norsys\score\tests\units\fs\path\filename\container\recipient;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\filename\container\recipient')
		;
	}

	function testFsPathFilenameContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$container = new mockOfScore\fs\path\filename\container
			)
			->if(
				$this->testedInstance->fsPathFilenameContainerIs($container)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $container ])
		;
	}
}
