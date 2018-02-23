<?php namespace norsys\score\tests\units\serializer\keyValue;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class json extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue')
		;
	}

	function testRecipientOfSerializedValueAtKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$key = uniqid(),
				$value = uniqid(),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSerializedValueAtKeyIs($value, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('"' . $key . '": "' . $value . '"')
							->once

			->given(
				$this->newTestedInstance,
				$key = '"',
				$value = uniqid(),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSerializedValueAtKeyIs($value, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('"\"": "' . $value . '"')
							->once

			->given(
				$this->newTestedInstance(1),
				$key = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfSerializedValueAtKeyIs($value, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(1))
				->mock($recipient)
					->receive('stringIs')
						->withArguments("	" . '"' . $key . '": "' . $value . '"')
							->once
		;
	}

	function testRecipientOfSerializedPartAtKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$key = uniqid(),
				$part = new mockOfScore\serializer\keyValue\part,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSerializedPartAtKeyIs($part, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$partSerializer = $this->newTestedInstance(1),
				$partAsString = uniqid(),
				$this->calling($part)->recipientOfStringMadeWithKeyValueSerializerIs = function($aSerializer, $aRecipient) use ($partSerializer, $partAsString) {
					if ($aSerializer == $partSerializer)
					{
						$aRecipient->stringIs($partAsString);
					}
				},

				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->recipientOfSerializedPartAtKeyIs($part, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('"' . $key . '": ' . $partAsString)
							->once

			->given(
				$partSerializer = $this->newTestedInstance(2),
				$partAsString = uniqid(),
				$this->calling($part)->recipientOfStringMadeWithKeyValueSerializerIs = function($aSerializer, $aRecipient) use ($partSerializer, $partAsString) {
					if ($aSerializer == $partSerializer)
					{
						$aRecipient->stringIs($partAsString);
					}
				},

				$this->newTestedInstance(1)
			)
			->if(
				$this->testedInstance->recipientOfSerializedPartAtKeyIs($part, $key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(1))
				->mock($recipient)
					->receive('stringIs')
						->withArguments("	" . '"' . $key . '": ' . $partAsString)
							->once
		;
	}
}
