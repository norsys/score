<?php namespace norsys\score\tests\units\container;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testBlockForIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$block = new mockOfScore\container\iterator\block,
				$this->calling($block)->containerIteratorHasValue = function($anIdentifier, $aValue) use (& $values) {
					$values[] = $aValue;
				}
			)
			->if(
				$this->testedInstance->blockForIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->variable($values)
					->isNull

			->given(
				$this->newTestedInstance(
					$value = uniqid(),
					$otherValue = rand(PHP_INT_MIN, PHP_INT_MAX)
				)
			)
			->if(
				$this->testedInstance->blockForIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value, $otherValue))
				->variable($values)
					->isEqualTo([ $value, $otherValue ])
		;
	}
}
