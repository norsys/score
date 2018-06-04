<?php namespace norsys\score\tests\units\trampoline\container;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\trampoline')
		;
	}

	function testTrampolineArgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance(
					$trampoline1 = new mockOfScore\trampoline,
					$trampoline2 = new mockOfScore\trampoline
				),

				$argumentForBlock = 3,

				$valueOfTrampoline1 = 1,
				$this->calling($trampoline1)->argumentsForBlockAre = function($block, $anArgument) use ($argumentForBlock, $valueOfTrampoline1) {
					if ($argumentForBlock == $anArgument)
					{
						$block->blockArgumentsAre($valueOfTrampoline1);
					}
				},

				$valueOfTrampoline2 = 2,
				$this->calling($trampoline2)->argumentsForBlockAre = function($block, $anArgument, $anAnotherArgument) use ($argumentForBlock, $valueOfTrampoline1, $valueOfTrampoline2) {
					if ($argumentForBlock == $anArgument && $valueOfTrampoline1 == $anAnotherArgument)
					{
						$block->blockArgumentsAre($valueOfTrampoline2);
					}
				},

				$block = new mockOfScore\php\block
			)
			->if(
				$this->testedInstance->argumentsForBlockAre($block, $argumentForBlock)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trampoline1, $trampoline2))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($argumentForBlock, $valueOfTrampoline1, $valueOfTrampoline2)
							->once

			->given(
				$block = new mockOfScore\php\block,

				$this->calling($trampoline1)->argumentsForBlockAre = function() {}
			)
			->if(
				$this->testedInstance->argumentsForBlockAre($block, $argumentForBlock)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trampoline1, $trampoline2))
				->mock($block)
					->receive('blockArgumentsAre')
						->never
		;
	}
}
