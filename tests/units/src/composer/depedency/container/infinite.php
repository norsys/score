<?php namespace norsys\score\tests\units\composer\depedency\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class infinite extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\container')
		;
	}

	function testBlockForIteratorIs()
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
						->withArguments($block)
							->once

			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				)
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, $depedency1, $depedency2, $depedency3)
							->once
		;
	}
}
