<?php namespace norsys\score\tests\units\net\uri;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri')
		;
	}

	function testRecipientOfUriAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$scheme = new mockOfScore\net\uri\scheme,
					$hierPart = new mockOfScore\net\uri\hierPart
				),
				$converter = new mockOfScore\net\uri\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUriAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$scheme,
							$hierPart
						)
					)
				->mock($converter)
					->receive('recipientOfNetUriAsStringIs')
						->withArguments($this->testedInstance, $recipient)
							->once
		;
	}

	function testRecipientOfNetUriSchemeAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$scheme = new mockOfScore\net\uri\scheme,
					$hierPart = new mockOfScore\net\uri\hierPart
				),
				$converter = new mockOfScore\net\uri\scheme\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfNetUriSchemeAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$scheme,
							$hierPart
						)
					)
				->mock($converter)
					->receive('recipientOfNetUriSchemeAsStringIs')
						->withArguments($scheme, $recipient)
							->once
		;
	}

	function testRecipientOfNetUriHierPartAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$scheme = new mockOfScore\net\uri\scheme,
					$hierPart = new mockOfScore\net\uri\hierPart
				),
				$converter = new mockOfScore\net\uri\hierPart\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfNetUriHierPartAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$scheme,
							$hierPart
						)
					)
				->mock($converter)
					->receive('recipientOfNetUriHierPartAsStringIs')
						->withArguments($hierPart, $recipient)
							->once
		;
	}
}
