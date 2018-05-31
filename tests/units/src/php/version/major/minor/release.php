<?php namespace norsys\score\tests\units\php\version\major\minor;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class release extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\version')
		;
	}

	function testtoStringConverterOfMajorNumberInPhpVersionForRecipientIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$major = new mockOfScore\php\version\number,
					$minor = new mockOfScore\php\version\number,
					$release = new mockOfScore\php\version\number
				),
				$converter = new mockOfScore\php\version\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->toStringConverterOfMajorNumberInPhpVersionForRecipientIs($recipient, $converter)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major, $minor, $release))
				->mock($converter)
					->receive('recipientOfPhpVersionNumberAsStringIs')
						->withArguments($major, $recipient)
							->once
		;
	}

	function testtoStringConverterOfMinorNumberInPhpVersionForRecipientIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$major = new mockOfScore\php\version\number,
					$minor = new mockOfScore\php\version\number,
					$release = new mockOfScore\php\version\number
				),
				$converter = new mockOfScore\php\version\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->toStringConverterOfMinorNumberInPhpVersionForRecipientIs($recipient, $converter)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major, $minor, $release))
				->mock($converter)
					->receive('recipientOfPhpVersionNumberAsStringIs')
						->withArguments($minor, $recipient)
							->once
		;
	}

	function testtoStringConverterOfReleaseNumberInPhpVersionForRecipientIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$major = new mockOfScore\php\version\number,
					$minor = new mockOfScore\php\version\number,
					$release = new mockOfScore\php\version\number
				),
				$converter = new mockOfScore\php\version\number\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->toStringConverterOfReleaseNumberInPhpVersionForRecipientIs($recipient, $converter)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major, $minor, $release))
				->mock($converter)
					->receive('recipientOfPhpVersionNumberAsStringIs')
						->withArguments($release, $recipient)
							->once
		;
	}
}
