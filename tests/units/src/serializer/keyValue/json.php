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
		;
	}
}
