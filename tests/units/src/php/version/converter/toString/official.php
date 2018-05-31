<?php namespace norsys\score\tests\units\php\version\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class official extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\version\converter\toString')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new php\version\number\converter\toString\asInteger));
	}

	function testRecipientOfPhpVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$converter = new mockOfScore\php\version\number\converter\toString
				),
				$version = new mockOfScore\php\version,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpVersionAsStringIs($version, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($converter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$majorNumberAsString = uniqid(),
				$this->calling($version)->toStringConverterOfMajorNumberInPhpVersionForRecipientIs = function($aRecipient, $aConverter) use ($converter, $majorNumberAsString) {
					if ($aConverter == $converter)
					{
						$aRecipient->stringIs($majorNumberAsString);
					}
				},

				$minorNumberAsString = uniqid(),
				$this->calling($version)->toStringConverterOfMinorNumberInPhpVersionForRecipientIs = function($aRecipient, $aConverter) use ($converter, $minorNumberAsString) {
					if ($aConverter == $converter)
					{
						$aRecipient->stringIs($minorNumberAsString);
					}
				},

				$releaseNumberAsString = uniqid(),
				$this->calling($version)->toStringConverterOfReleaseNumberInPhpVersionForRecipientIs = function($aRecipient, $aConverter) use ($converter, $releaseNumberAsString) {
					if ($aConverter == $converter)
					{
						$aRecipient->stringIs($releaseNumberAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpVersionAsStringIs($version, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($converter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorNumberAsString . '.' . $minorNumberAsString . '.' . $releaseNumberAsString)
							->once
		;
	}
}
