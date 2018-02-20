<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString\dot\major\minor;

require __DIR__ . '/../../../../../../../../../../runner.php';

use norsys\score\{ tests\units, php };
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
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new php\integer\converter\toString\identical));
	}

	function testRecipientOfSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToStringConverter = new mockOfScore\php\integer\converter\toString,
					$minorToStringConverter = new mockOfScore\php\integer\converter\toString
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
				$major = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfMajorNumberInSemverIs = function($aRecipient) use ($major) {
					$aRecipient->semverVersionNumberIs($major);
				},

				$majorAsString = uniqid(),
				$this->calling($majorToStringConverter)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($major, $majorAsString) {
					if ($aPhpInteger == $major)
					{
						$aRecipient->stringIs($majorAsString);
					}
				},

				$minor = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfMinorNumberInSemverIs = function($aRecipient) use ($minor) {
					$aRecipient->semverVersionNumberIs($minor);
				},

				$minorAsString = uniqid(),
				$this->calling($minorToStringConverter)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($minor, $minorAsString) {
					if ($aPhpInteger == $minor)
					{
						$aRecipient->stringIs($minorAsString);
					}
				},

				$this->calling($semver)->recipientOfPatchNumberInSemverIs = function($aRecipient) use ($minor) {
					$aRecipient->semverVersionNumberIs(new mockOfScore\composer\depedency\version\semver\number);
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