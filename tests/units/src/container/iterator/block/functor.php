<?php namespace norsys\score\tests\units\container\iterator\block;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\container\iterator\block')
		;
	}

	function testContainerIteratorHasValue()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function($iterator, $value) use (& $arguments) { $arguments = func_get_args(); }),
				$iterator = new mockOfScore\container\iterator,
				$value = uniqid()
			)
			->if(
				$this->testedInstance->containerIteratorHasValue($iterator, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $iterator, $value ])
		;
	}
}
