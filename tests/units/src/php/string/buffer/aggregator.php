<?php namespace norsys\score\tests\units\php\string\buffer;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class aggregator extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\provider')
			->implements('norsys\score\php\string\recipient')
			->implements('norsys\score\php\string\buffer')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($buffer = new mockOfScore\php\string\buffer),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($buffer))
				->mock($buffer)
					->receive('recipientOfStringFromBufferIs')
						->withArguments($recipient)
							->once
		;
	}

	function testRecipientOfStringFromBufferIs()
	{
		$this
			->given(
				$this->newTestedInstance($buffer = new mockOfScore\php\string\buffer),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringFromBufferIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($buffer))
				->mock($buffer)
					->receive('recipientOfStringFromBufferIs')
						->withArguments($recipient)
							->once
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($buffer = new mockOfScore\php\string\buffer),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($buffer))
				->mock($buffer)
					->receive('stringForBufferIs')
						->withArguments($string)
							->once
		;
	}

	function testStringForBufferIs()
	{
		$this
			->given(
				$this->newTestedInstance($buffer = new mockOfScore\php\string\buffer),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringForBufferIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($buffer))
				->mock($buffer)
					->receive('stringForBufferIs')
						->withArguments($string)
							->once
		;
	}

	function testRecipientOfStringFromProviderIs()
	{
		$this
			->given(
				$this->newTestedInstance($buffer = new mockOfScore\php\string\buffer),
				$provider = new mockOfScore\php\string\provider,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringFromProviderIs($provider, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($buffer))
				->mock($buffer)
					->receive('recipientOfStringFromProviderIs')
						->withArguments($provider, $recipient)
							->once
		;

	}
}
