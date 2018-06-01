<?php namespace norsys\score\tests\units\container\iterator;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\container\iterator')
		;
	}

	function testVariablesForIteratorBlockAre()
	{
		$this
			->given(
				$this->newTestedInstance,

				$variables = [ $firstVariable = rand(PHP_INT_MIN, PHP_INT_MAX), uniqid(), [], new \stdClass ],

				$block = new mockOfScore\container\iterator\block,
				$this->calling($block)->containerIteratorHasValue = function($iterator, $value) use (& $variablesFromIterator) {
					$variablesFromIterator[] = $value;
				}
			)
			->if(
				$this->testedInstance->variablesForIteratorBlockAre($block, ...$variables)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->array($variablesFromIterator)
					->isEqualTo($variables)

			->given(
				$variablesFromIterator = null,

				$this->calling($block)->containerIteratorHasValue = function($iterator, $value) use (& $variablesFromIterator) {
					$variablesFromIterator[] = $value;

					$iterator->nextIterationAreUseless();
				}
			)
			->if(
				$this->testedInstance->variablesForIteratorBlockAre($block, ...$variables)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->array($variablesFromIterator)
					->isEqualTo([ $firstVariable ])
		;
	}

	function testNextIterationAreUseless()
	{
		$this
			->given(
				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->nextIterationAreUseless()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
		;
	}

	function testNextIterationAreUsefull()
	{
		$this
			->given(
				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->nextIterationAreUsefull()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
		;
	}
}
