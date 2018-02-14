<?php namespace norsys\score\tests\units\composer\depedency\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\recipient')
		;
	}

	function testComposerDepedencyIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$depedency = new mockOfScore\composer\depedency
			)
			->if(
				$this->testedInstance->composerDepedencyIs($depedency)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $depedency ])
		;
	}
}
