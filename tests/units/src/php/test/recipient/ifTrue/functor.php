<?php namespace norsys\score\tests\units\php\test\recipient\ifTrue;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\recipient')
		;
	}

	function testBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); })
			)

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->variable($arguments)
					->isNull

			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEmpty
		;
	}
}
