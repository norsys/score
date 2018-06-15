<?php namespace norsys\score\tests\units\composer\scripts\method\sensio\bundle\distribution\bundle\composer\script\handler\build;

require __DIR__ . '/../../../../../../../../../../../../runner.php';

use norsys\score\{ tests\units, php, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class bootstrap extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\scripts\part')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($converter = new mockOfScore\php\method\converter\toString),
				$serializer = new mockOfScore\serializer\keyValue,

				$methodAsString = uniqid(),
				$this->calling($converter)->recipientOfPhpMethodAsStringIs = function($aMethod, $aRecipient) use ($methodAsString) {
					if ($aMethod == new php\method\sensio\bundle\distribution\bundle\composer\script\handler\build\bootstrap)
					{
						$aRecipient->stringIs($methodAsString);
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($converter))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new text($methodAsString))
							->once
		;
	}
}
