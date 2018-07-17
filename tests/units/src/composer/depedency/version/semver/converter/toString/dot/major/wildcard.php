<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString\dot\major;

require __DIR__ . '/../../../../../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver };
use mock\norsys\score as mockOfScore;

class wildcard extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\converter\toString')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new semver\number\converter\toString\identical));
	}

	function testRecipientOfSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$converter = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($converter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$majorAsString = uniqid(),
				$this->calling($semver)->recipientOfMajorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($converter, $majorAsString) {
					if ($aConverter == $converter)
					{
						$aRecipient->stringIs($majorAsString);
					}
				},

				$this->calling($semver)->recipientOfMinorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) {
					$aConverter->recipientOfSemverNumberAsStringIs(new mockOfScore\composer\depedency\version\semver\number, $aRecipient);
				},

				$this->calling($semver)->recipientOfPatchNumberAsStringFromConverterIs = function($aConverter, $aRecipient) {
					$aConverter->recipientOfSemverNumberAsStringIs(new mockOfScore\composer\depedency\version\semver\number, $aRecipient);
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($converter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.*')
							->once
		;
	}
}
