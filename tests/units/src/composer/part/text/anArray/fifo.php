<?php namespace norsys\score\tests\units\composer\part\text\anArray;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\part\text\anArray')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$text = new mockOfScore\composer\part\text,
					$otherText = new mockOfScore\composer\part\text,
					$anOtherText = new mockOfScore\composer\part\text
				),
				$serializer = new mockOfScore\serializer\keyValue,
				$this->calling($serializer)->textToSerializeIs = function($text) use (& $texts) {
					$texts[] = $text;
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($text, $otherText, $anOtherText))
				->array($texts)
					->isEqualTo([ $text, $otherText, $anOtherText ])
		;
	}
}
