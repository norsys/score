<?php namespace norsys\score\tests\units\composer\part\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$part1 = new mockOfScore\composer\part,
					$part2 = new mockOfScore\composer\part,
					$part3 = new mockOfScore\composer\part
				),

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
					->isEqualTo($this->newTestedInstance($part1, $part2, $part3))
				->array($parts)
					->isEqualTo([ $part1, $part2, $part3 ])
		;
	}

}
