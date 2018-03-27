<?php namespace norsys\score\tests\units\composer\part\anArray;

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
					$part = new mockOfScore\composer\part,
					$otherPart = new mockOfScore\composer\part,
					$anOtherPart = new mockOfScore\composer\part
				),

				$serializer = new mockOfScore\serializer\keyValue,

				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use (& $serializers, $serializer, $part) {
					if ($aSerializer == $serializer)
					{
						$serializers[] = $part;
					}
				},

				$this->calling($otherPart)->keyValueSerializerIs = function($aSerializer) use (& $serializers, $serializer, $otherPart) {
					if ($aSerializer == $serializer)
					{
						$serializers[] = $otherPart;
					}
				},

				$this->calling($anOtherPart)->keyValueSerializerIs = function($aSerializer) use (& $serializers, $serializer, $anOtherPart) {
					if ($aSerializer == $serializer)
					{
						$serializers[] = $anOtherPart;
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part, $otherPart, $anOtherPart))
				->array($serializers)
					->isEqualTo([ $part, $otherPart, $anOtherPart ])
		;
	}
}
