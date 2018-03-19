<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\container;

require __DIR__ . '/../../../../../../runner.php';

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
					$mapping1 = new mockOfScore\composer\autoload\psr4\mapping,
					$mapping2 = new mockOfScore\composer\autoload\psr4\mapping,
					$mapping3 = new mockOfScore\composer\autoload\psr4\mapping
				),
				$serializer = new mockOfScore\serializer\keyValue,

				$mappings = [],

				$this->calling($mapping1)->keyValueSerializerIs = function($aSerializer) use (& $mappings, $mapping1, $serializer) {
					if ($aSerializer == $serializer)
					{
						$mappings[] = $mapping1;
					}
				},

				$this->calling($mapping2)->keyValueSerializerIs = function($aSerializer) use (& $mappings, $mapping2, $serializer) {
					if ($aSerializer == $serializer)
					{
						$mappings[] = $mapping2;
					}
				},

				$this->calling($mapping3)->keyValueSerializerIs = function($aSerializer) use (& $mappings, $mapping3, $serializer) {
					if ($aSerializer == $serializer)
					{
						$mappings[] = $mapping3;
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($mapping1, $mapping2, $mapping3))
				->array($mappings)
					->isEqualTo([ $mapping1, $mapping2, $mapping3 ])
		;
	}
}
