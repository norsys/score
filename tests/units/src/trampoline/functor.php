<?php namespace norsys\score\tests\units\trampoline;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\trampoline')
		;
	}

	function testArgumentsForBlockAre()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $trampolineArguments) { $trampolineArguments = func_get_args(); }),
				$block = new mockOfScore\php\block,
				$arguments = [ null, '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, false, true, new \stdClass, [] ]
			)
			->if(
				$this->testedInstance->argumentsForBlockAre($block, ... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($trampolineArguments)
					->isEqualTo(array_merge([ $block ], $arguments))
		;
	}
}
