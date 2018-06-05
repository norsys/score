<?php namespace norsys\score\tests\units\composer\authors\author\name;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\author\name, composer\part\text\any as text, human\name\converter\toString };
use mock\norsys\score as mockOfScore;

class human extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author\name')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance($name = new mockOfScore\human\name))->isEqualTo($this->newTestedInstance($name, new toString\firstname\lastname));
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($name = new mockOfScore\human\name, $converter = new mockOfScore\human\name\converter\toString),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $converter))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->never

			->given(
				$nameAsString = uniqid(),
				$this->calling($converter)->recipientOfHumanNameAsStringIs = function($aName, $aRecipient) use ($name, $nameAsString) {
					if ($aName == $name)
					{
						$aRecipient->stringIs($nameAsString);
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $converter))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name, new text($nameAsString))
							->once
		;
	}
}
