<?php namespace norsys\score\tests\units\net\uri\path;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class abempty extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\path')
		;
	}

	function testRecipientOfSegmentInNetUriPathAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$segment = new mockOfScore\net\uri\path\segment
				),
				$converter = new mockOfScore\net\uri\path\segment\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSegmentInNetUriPathAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($segment))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$segmentAsString = uniqid(),
				$this->calling($converter)->recipientOfSegmentInNetUriPathAsStringIs = function($aSegment, $aRecipient) use ($segment, $segmentAsString) {
					if ($segment == $aSegment)
					{
						$aRecipient->stringIs($segmentAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSegmentInNetUriPathAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($segment))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($segmentAsString)
							->once

			->given(
				$this->newTestedInstance(
					$segment = new mockOfScore\net\uri\path\segment,
					$otherSegment = new mockOfScore\net\uri\path\segment
				),

				$otherSegmentAsString = uniqid(),
				$this->calling($converter)->recipientOfSegmentInNetUriPathAsStringIs = function($aSegment, $aRecipient) use ($segment, $segmentAsString, $otherSegment, $otherSegmentAsString) {
					switch (true)
					{
						case $segment == $aSegment:
							$aRecipient->stringIs($segmentAsString);
							break;

						case $otherSegment == $aSegment:
							$aRecipient->stringIs($otherSegmentAsString);
							break;
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSegmentInNetUriPathAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($segment, $otherSegment))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($segmentAsString . $otherSegmentAsString)
							->once
		;
	}
}
