<?php namespace norsys\score\tests\units\php\test\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\recipient')
		;
	}


	/**
	 * @dataProvider booleanProvider
	 */
	function testBooleanIs($boolean)
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); })
			)
			->if(
				$this->testedInstance->booleanIs($boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $boolean ])
		;
	}

	protected function booleanProvider()
	{
		return [
			true,
			false
		];
	}
}
