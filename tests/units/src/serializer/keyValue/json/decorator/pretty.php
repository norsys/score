<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\json\decorator\pretty\line };
use mock\norsys\score as mockOfScore;

class pretty extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\decorator')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new line\blank\not, new line\blank, new line\blank\not));
	}

	function testRecipientOfDecoratedJsonKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$key = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($notBlankLine, $blankLine, $notBlankLine))
				->mock($blankLine)
					->receive('recipientOfStringIs')
						->withArguments($key, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonNameSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$separator = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonNameSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($notBlankLine)
					->receive('recipientOfStringIs')
						->withArguments($separator . ' ', $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonValueIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$value = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($currentLine)
					->receive('recipientOfStringIs')
						->withArguments($value, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonValueSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),
				$separator = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($notBlankLine)
					->receive('recipientOfStringIs')
						->withArguments($separator, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForObjectIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($currentLine)
					->receive('recipientOfStringIs')
						->withArguments($tag, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForObjectIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($blankLine)
					->receive('recipientOfStringIs')
						->withArguments($tag, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($currentLine)
					->receive('recipientOfStringIs')
						->withArguments($tag, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($blankLine)
					->receive('recipientOfStringIs')
						->withArguments($tag, $recipient)
							->once
		;
	}

	function testRecipientOfDecoratorForJsonPartIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$currentLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$blankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
					$notBlankLine = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->never

			->given(
				$blankLineForPart = new mockOfScore\serializer\keyValue\json\decorator\pretty\line,
				$this->calling($blankLine)->recipientOfJsonLineDecoratorForPartIs = function($aRecipient) use ($blankLineForPart) {
					$aRecipient->jsonLineDecoratorIs($blankLineForPart);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($currentLine, $blankLine, $notBlankLine))
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->withArguments($this->newTestedInstance($blankLineForPart, $blankLineForPart, $notBlankLine))
							->once
		;
	}
}
