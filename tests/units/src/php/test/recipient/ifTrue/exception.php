<?php namespace norsys\score\tests\units\php\test\recipient\ifTrue;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class exception extends units\test
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
				$this->newTestedInstance($exception = new \mock\exception)
			)
			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))

				->exception(function() { $this->testedInstance->booleanIs(true); })
					->isEqualTo($exception)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))
		;
	}
}
