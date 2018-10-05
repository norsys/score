<?php namespace norsys\score\tests\units\php\string\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class buffer extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
			->implements('norsys\score\php\string\provider')
			->implements('norsys\score\php\string\buffer')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))

			->given(
				$this->newTestedInstance($inBuffer = uniqid())
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($inBuffer . $string))
		;
	}

	function testStringForBufferIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringForBufferIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))

			->given(
				$this->newTestedInstance($inBuffer = uniqid())
			)
			->if(
				$this->testedInstance->stringForBufferIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($inBuffer . $string))
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->newTestedInstance($string = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}

	function testRecipientOfStringFromBufferIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringFromBufferIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->newTestedInstance($string = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringFromBufferIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}

	function testRecipientOfStringFromProviderIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$provider = new mockOfScore\php\string\provider,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringFromProviderIs($provider, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$string = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($string) {
					$aRecipient->stringIs($string);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringFromProviderIs($provider, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
