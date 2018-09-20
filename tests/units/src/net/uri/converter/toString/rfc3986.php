<?php namespace norsys\score\tests\units\net\uri\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\converter\toString')
		;
	}

	function testRecipientOfNetPortAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$schemeConverter = new mockOfScore\net\uri\scheme\converter\toString,
					$hierPartConverter = new mockOfScore\net\uri\hierPart\converter\toString
				),
				$uri = new mockOfScore\net\uri,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfNetUriAsStringIs($uri, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($schemeConverter, $hierPartConverter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$schemeAsString = uniqid(),
				$this->calling($uri)->recipientOfNetUriSchemeAsStringFromConverterIs = function($aSchemeConverter, $aRecipient) use ($schemeConverter, $schemeAsString) {
					if ($aSchemeConverter == $schemeConverter)
					{
						$aRecipient->stringIs($schemeAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfNetUriAsStringIs($uri, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($schemeConverter, $hierPartConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($schemeAsString)
							->once

			->given(
				$hierPartAsString = uniqid(),
				$this->calling($uri)->recipientOfNetUriHierPartAsStringFromConverterIs = function($aHierPartConverter, $aRecipient) use ($hierPartConverter, $hierPartAsString) {
					if ($aHierPartConverter == $hierPartConverter)
					{
						$aRecipient->stringIs($hierPartAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfNetUriAsStringIs($uri, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($schemeConverter, $hierPartConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($schemeAsString . ':' . $hierPartAsString)
							->once

			->given(
				$uri = new mockOfScore\net\uri,
				$recipient = new mockOfScore\php\string\recipient,
				$hierPartAsString = uniqid(),
				$this->calling($uri)->recipientOfNetUriHierPartAsStringFromConverterIs = function($aHierPartConverter, $aRecipient) use ($hierPartConverter, $hierPartAsString) {
					if ($aHierPartConverter == $hierPartConverter)
					{
						$aRecipient->stringIs($hierPartAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfNetUriAsStringIs($uri, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($schemeConverter, $hierPartConverter))
				->mock($recipient)
					->receive('stringIs')
						->never
		;
	}
}
