<?php namespace norsys\score\tests\units\composer\part\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part\container')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$iterator = new mockOfScore\container\iterator,
					$part1 = new mockOfScore\composer\part,
					$part2 = new mockOfScore\composer\part,
					$part3 = new mockOfScore\composer\part
				),

				$this->calling($iterator)->variablesForIteratorBlockAre = function($aBlock, ...$someVariables) use ($iterator, $part1, $part2, $part3) {
					if ($someVariables == [ $part1, $part2, $part3 ])
					{
						$aBlock->containerIteratorHasValue($iterator, $part1);
						$aBlock->containerIteratorHasValue($iterator, $part2);
						$aBlock->containerIteratorHasValue($iterator, $part3);
					}
				},

				$serializer = new mockOfScore\serializer\keyValue,

				$parts = [],

				$this->calling($part1)->keyValueSerializerIs = function($aSerializer) use (& $parts, $part1, $serializer) {
					if ($aSerializer == $serializer)
					{
						$parts[] = $part1;
					}
				},

				$this->calling($part2)->keyValueSerializerIs = function($aSerializer) use (& $parts, $part2, $serializer) {
					if ($aSerializer == $serializer)
					{
						$parts[] = $part2;
					}
				},

				$this->calling($part3)->keyValueSerializerIs = function($aSerializer) use (& $parts, $part3, $serializer) {
					if ($aSerializer == $serializer)
					{
						$parts[] = $part3;
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $part1, $part2, $part3))
				->array($parts)
					->isEqualTo([ $part1, $part2, $part3 ])
		;
	}

	function testBlockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$iterator = new mockOfScore\container\iterator,
					$part1 = new mockOfScore\composer\part,
					$part2 = new mockOfScore\composer\part,
					$part3 = new mockOfScore\composer\part
				),

				$block = new mockOfScore\container\iterator\block
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($iterator, $part1, $part2, $part3))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, $part1, $part2, $part3)
							->once
		;
	}
}
