<?php namespace norsys\score\tests\units\composer\depedency\version\semver;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class prefixed extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver')
		;
	}

	function testRecipientOfMajorNumberInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMajorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfMajorNumberInSemverIs')
						->withArguments($recipient)
							->once
		;
	}

	function testRecipientOfMajorNumberAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$converter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMajorNumberAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfMajorNumberAsStringFromConverterIs')
						->withArguments($converter, $recipient)
							->once
		;
	}

	function testRecipientOfMinorInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfMinorNumberInSemverIs')
						->withArguments($recipient)
							->once
		;
	}

	function testRecipientOfMinorNumberAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$converter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorNumberAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfMinorNumberAsStringFromConverterIs')
						->withArguments($converter, $recipient)
							->once
		;
	}

	function testRecipientOfPatchInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfPatchNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfPatchNumberInSemverIs')
						->withArguments($recipient)
							->once
		;
	}

	function testRecipientOfPatchNumberAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$converter = new mockOfScore\composer\depedency\version\semver\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPatchNumberAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($semver)
					->receive('recipientOfPatchNumberAsStringFromConverterIs')
						->withArguments($converter, $recipient)
							->once
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$semver = new mockOfScore\composer\depedency\version\semver
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$versionAsString = uniqid(),
				$this->calling($semver)->recipientOfStringIs = function($aRecipient) use ($versionAsString) {
					$aRecipient->stringIs($versionAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($semver))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('v' . $versionAsString)
							->once
		;
	}
}
