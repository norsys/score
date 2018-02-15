<?php namespace norsys\score\tests\units\composer\depedency\name\recipient;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\name\recipient')
		;
	}

	function testNameOfComposerDepedencyIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function($name) use (& $arguments) { $arguments = func_get_args(); }),
				$name = new mockOfScore\composer\depedency\name
			)
			->if(
				$this->testedInstance->nameOfComposerDepedencyIs($name)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $name ])
		;
	}
}
