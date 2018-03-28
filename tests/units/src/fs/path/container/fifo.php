<?php namespace norsys\score\tests\units\fs\path\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, container\iterator };
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\container')
		;
	}

	function testBLockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,

				$block = new mockOfScore\container\iterator\block,
				$this->calling($block)->containerIteratorHasValue = function($anIterator, $aValue) use (& $paths) {
					if ($anIterator = new iterator\fifo)
					{
						$paths[] = $aValue;
					}
				}
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->variable($paths)
					->isNull

			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\fs\path,
					$otherPath = new mockOfScore\fs\path,
					$anOtherPath = new mockOfScore\fs\path
				)
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path, $otherPath, $anOtherPath))
				->array($paths)
					->isEqualTo([ $path, $otherPath, $anOtherPath ])
		;
	}
}
