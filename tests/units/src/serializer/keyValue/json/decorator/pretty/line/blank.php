<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator\pretty\line;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\serializer\keyValue\json\depth;
use mock\norsys\score as mockOfScore;

class blank extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\decorator\pretty\line')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new depth\any));
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),
				$string = uniqid(),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments(PHP_EOL . $string)
							->once

			->given(
				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments(PHP_EOL . str_repeat("	", $depthAsInteger) . $string)
							->once
		;
	}

	function testRecipientOfJsonLineDecoratorForPartIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\pretty\line\recipient
			)
			->if(
				$this->testedInstance->recipientOfJsonLineDecoratorForPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('jsonLineDecoratorIs')
						->never

			->given(
				$nextDepth = new mockOfScore\serializer\keyValue\json\depth,
				$this->calling($depth)->recipientOfNextDepthIs = function($aRecipient) use ($nextDepth) {
					$aRecipient->jsonDepthIs($nextDepth);
				}
			)
			->if(
				$this->testedInstance->recipientOfJsonLineDecoratorForPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('jsonLineDecoratorIs')
						->withArguments($this->newTestedInstance($nextDepth))
							->once
		;
	}
}
