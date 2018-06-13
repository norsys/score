<?php namespace norsys\score\tests\units\composer\scripts;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\text\any as text, php };
use mock\norsys\score as mockOfScore;

class method extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\scripts\part')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance($method = new mockOfScore\php\method))->isEqualTo($this->newTestedInstance($method, new php\method\converter\toString\official));
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($method = new mockOfScore\php\method, $converter = new mockOfScore\php\method\converter\toString),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($method, $converter))
				->mock($serializer)
					->receive('textToSerializeIs')
						->never

			->given(
				$methodAsString = uniqid(),
				$this->calling($converter)->recipientOfPhpMethodAsStringIs = function($aMethod, $aRecipient) use ($method, $methodAsString) {
					if ($aMethod == $method)
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
					->isEqualTo($this->newTestedInstance($method, $converter))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new text($methodAsString))
							->once
		;
	}
}
