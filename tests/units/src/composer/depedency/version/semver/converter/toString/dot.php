<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver };
use mock\norsys\score as mockOfScore;

class dot extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\converter\toString')
		;
	}

	function test__construct()
	{
		$this
			->object($this->newTestedInstance)
				->isEqualTo(
					$this->newTestedInstance(
						new semver\number\converter\toString\identical,
						new semver\number\converter\toString\identical,
						new semver\number\converter\toString\identical
					)
				)
		;
	}

	function testRecipientOfMajorInSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$patchToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMajorInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$majorAsString = uniqid(),
				$this->calling($semver)->recipientOfMajorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($majorToString, $majorAsString) {
					if ($aConverter == $majorToString)
					{
						$aRecipient->stringIs($majorAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfMajorInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString)
							->once
		;
	}

	function testRecipientOfMinorInSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$patchToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$minorAsString = uniqid(),
				$this->calling($semver)->recipientOfMinorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($minorToString, $minorAsString) {
					if ($aConverter == $minorToString)
					{
						$aRecipient->stringIs($minorAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfMinorInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($minorAsString)
							->once
		;
	}

	function testRecipientOfPatchInSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$patchToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPatchInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$patchAsString = uniqid(),
				$this->calling($semver)->recipientOfPatchNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($patchToString, $patchAsString) {
					if ($aConverter == $patchToString)
					{
						$aRecipient->stringIs($patchAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfPatchInSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($patchAsString)
							->once
		;
	}

	function testRecipientOfSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$patchToString = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$majorAsString = 'major',
				$this->calling($semver)->recipientOfMajorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($majorToString, $majorAsString) {
					if ($aConverter == $majorToString)
					{
						$aRecipient->stringIs($majorAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$minorAsString = 'minor',
				$this->calling($semver)->recipientOfMinorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($minorToString, $minorAsString) {
					if ($aConverter == $minorToString)
					{
						$aRecipient->stringIs($minorAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$patchAsString = 'patch',
				$this->calling($semver)->recipientOfPatchNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($patchToString, $patchAsString) {
					if ($aConverter == $patchToString)
					{
						$aRecipient->stringIs($patchAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString . '.' . $patchAsString)
							->once
		;
	}
}
