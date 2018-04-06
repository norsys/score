<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator\pretty\line\blank;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class not extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\decorator\pretty\line')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$string = uniqid(),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($string, $recipient)
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

	function testRecipientOfJsonLineDecoratorForPartIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\pretty\line\recipient
			)
			->if(
				$this->testedInstance->recipientOfJsonLineDecoratorForPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('jsonLineDecoratorIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
