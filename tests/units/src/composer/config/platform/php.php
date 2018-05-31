<?php namespace norsys\score\tests\units\composer\config\platform;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\name, composer\part\text, php\version };
use mock\norsys\score as mockOfScore;

class php extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\platform\constraint')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance($version = new mockOfScore\php\version))->isEqualTo($this->newTestedInstance($version, new version\converter\toString\official));
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$version = new mockOfScore\php\version,
					$converter = new mockOfScore\php\version\converter\toString
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version, $converter))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->never

			->given(
				$versionAsString = uniqid(),
				$this->calling($converter)->recipientOfPhpVersionAsStringIs = function($aPhpVersion, $aRecipient) use ($version, $versionAsString) {
					if ($aPhpVersion === $version)
					{
						$aRecipient->stringIs($versionAsString);
					}
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version, $converter))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name\php, new text\any($versionAsString))
							->once
		;
	}
}
