<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString\dot;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver\number };
use mock\norsys\score as mockOfScore;

class aggregator extends units\test
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
						new number\converter\toString\identical,
						new number\converter\toString\identical,
						new number\converter\toString\identical
					)
				)
		;
	}

	function testRecipientofSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToStringConverter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$minorToStringConverter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
					$patchToStringConverter = new mockOfScore\composer\depedency\version\semver\number\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter, $patchToStringConverter))
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
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter, $patchToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString)
							->once

			->given(
				$minorAsString = uniqid(),
				$this->calling($semver)->recipientOfMinorNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($minorToStringConverter, $minorAsString) {
					if ($aConverter == $minorToStringConverter)
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
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter, $patchToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString)
							->once


			->given(
				$patchAsString = uniqid(),
				$this->calling($semver)->recipientOfpatchNumberAsStringFromConverterIs = function($aConverter, $aRecipient) use ($patchToStringConverter, $patchAsString) {
					if ($aConverter == $patchToStringConverter)
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
					->isEqualTo($this->newTestedInstance($majorToStringConverter, $minorToStringConverter, $patchToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString . '.' . $patchAsString)
							->once
		;
	}
}
