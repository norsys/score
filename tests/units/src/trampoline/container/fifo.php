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
					$trampoline2 = new mockOfScore\trampoline,
					$trampoline3 = new mockOfScore\trampoline
				),

				$trampolines = [],

				$valueOfTrampoline1 = uniqid(),
				$this->calling($trampoline1)->trampolineArgumentsAre = function($trampoline) use (& $trampolines, $valueOfTrampoline1) {
					$trampolines[] = [];

					$trampoline->trampolineArgumentsAre($valueOfTrampoline1);
				},

				$valueOfTrampoline2 = uniqid(),
				$this->calling($trampoline2)->trampolineArgumentsAre = function($trampoline, $value1) use (& $trampolines, $valueOfTrampoline2) {
					$trampolines[] = [ $value1 ];

					$trampoline->trampolineArgumentsAre($valueOfTrampoline2);
				},

				$this->calling($trampoline3)->trampolineArgumentsAre = function($trampoline, $value1, $value2) use (& $trampolines) {
					$trampolines[] = [ $value1, $value2 ];
				}
			)
			->if(
				$this->testedInstance->trampolineArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trampoline1, $trampoline2, $trampoline3))
				->array($trampolines)
					->isEqualTo([
							[],
							[ $valueOfTrampoline1 ],
							[ $valueOfTrampoline1, $valueOfTrampoline2 ]
						]
					)

			->given(
				$trampolines = [],
				$this->calling($trampoline1)->trampolineArgumentsAre = function() {}
			)
			->if(
				$this->testedInstance->trampolineArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trampoline1, $trampoline2, $trampoline3))
				->array($trampolines)
					->isEmpty
		;
	}
}
