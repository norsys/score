<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString\dot\major\minor;

require __DIR__ . '/../../../../../../../../../../runner.php';

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
					$majorToStringConverter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToStringConverter = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$majorAsString = uniqid(),
				$this->calling($semver)->recipientOfMajorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($majorToStringConverter, $majorAsString) {
					if ($aConverter == $majorToStringConverter)
					{
						$aRecipient->stringIs($majorAsString);
					}
				},

				$minorAsString = uniqid(),
				$this->calling($semver)->recipientOfMinorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($minorToStringConverter, $minorAsString) {
					if ($aConverter == $minorToStringConverter)
					{
						$aRecipient->stringIs($minorAsString);
					}
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
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString . '.*')
							->once
		;
	}
}
