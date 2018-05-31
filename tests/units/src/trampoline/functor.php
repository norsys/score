<?php namespace norsys\score\tests\units\trampoline;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\trampoline')
		;
	}

	function testTrampolineArgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $trampolineArguments) { $trampolineArguments = func_get_args(); }),
				$arguments = [ null, '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, false, true, new \stdClass, [] ]
			)
			->if(
				$this->testedInstance->trampolineArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($trampolineArguments)
					->isEqualTo($arguments)
		;
	}
}
