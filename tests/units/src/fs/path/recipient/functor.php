<?php namespace norsys\score\tests\units\fs\path\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\recipient')
		;
	}

	function testFsPathIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$path = new mockOfScore\fs\path
			)
			->if(
				$this->testedInstance->fsPathIs($path)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $path ])
		;
	}
}
