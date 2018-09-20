<?php namespace norsys\score\tests\units\net\uri\path\segment\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\path\segment\converter\toString')
		;
	}

	function testRecipientOfSegmentInNetUriPathAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$segment = new mockOfScore\net\uri\path\segment,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSegmentInNetUriPathAsStringIs($segment, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$segmentAsString = uniqid(),
				$this->calling($segment)->recipientOfStringIs = function($aRecipient) use ($segmentAsString) {
					$aRecipient->stringIs($segmentAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfSegmentInNetUriPathAsStringIs($segment, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('/' . $segmentAsString)
							->once
		;
	}
}
