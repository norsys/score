<?php namespace norsys\score\tests\units\composer\depedency\container\recipient;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\container\recipient')
		;
	}

	function testComposerDepedenciesIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$depedencies = new mockOfScore\composer\depedency\container
			)
			->if(
				$this->testedInstance->composerDepedenciesIs($depedencies)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $depedencies ])
		;
	}
}
