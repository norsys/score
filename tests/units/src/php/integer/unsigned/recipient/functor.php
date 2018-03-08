<?php namespace norsys\score\tests\units\php\integer\unsigned\recipient;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\integer\unsigned\recipient')
		;
	}

	function testUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$integer = rand(0, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->unsignedIntegerIs($integer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $integer ])
		;
	}
}
