<?php namespace norsys\score\tests\units\php\test\recipient\ifFalse\exception;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;

class fallback extends units\test
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
				$this->newTestedInstance($defaultException = new \mock\exception)
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($defaultException))

				->exception(function() { $this->testedInstance->booleanIs(false); })
					->isEqualTo($defaultException)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($defaultException))

			->given(
				$this->newTestedInstance($defaultException = new \mock\exception, $exception  = new \mock\exception)
			)
			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($defaultException, $exception))

				->exception(function() { $this->testedInstance->booleanIs(false); })
					->isEqualTo($exception)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($defaultException, $exception))
		;
	}
}
