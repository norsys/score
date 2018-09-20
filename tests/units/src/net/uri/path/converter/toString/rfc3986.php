<?php namespace norsys\score\tests\units\net\uri\path\converter\toString;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\net\uri\path;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\path\converter\toString')
		;
	}

	function testRecipientOfNetUriPathAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$path = new mockOfScore\net\uri\path,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfNetUriPathAsStringIs($path, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$segmentAsString = uniqid(),
				$this->calling($path)->recipientOfSegmentInNetUriPathAsStringFromConverterIs = function($aConverter, $aRecipient) use ($segmentAsString) {
					if ($aConverter == new path\segment\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($segmentAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfNetUriPathAsStringIs($path, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($segmentAsString)
							->once
		;
	}
}
