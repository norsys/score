<?php namespace norsys\score\tests\units\composer\depedency\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\container')
		;
	}

	function testBlockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$iterator = new mockOfScore\container\iterator,
				$block = new mockOfScore\container\iterator\block
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->never
		;
	}
}
