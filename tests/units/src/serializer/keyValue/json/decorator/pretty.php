<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\json\depth, serializer\keyValue\json\decorator\pretty\line };
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
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new depth\any));
	}

	function testRecipientOfDecoratedJsonKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$key = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) { $buffer .= $aString; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $key)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $key)
		;
	}

	function testRecipientOfDecoratedJsonValueIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$value = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($value)
							->once
		;
	}

	function testRecipientOfDecoratedJsonNameSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$separator = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonNameSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($separator . ' ')
							->once
		;
	}

	function testRecipientOfDecoratedJsonValueSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),
				$separator = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($separator)
							->once
		;
	}

	function testRecipientOfDecoratedJsonTextInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$text = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonTextInArrayIs($text, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $text)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonTextInArrayIs($text, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $text)
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForObjectIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForObjectIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $tag)
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForObjectInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $tag)
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForObjectInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $tag)
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth
				),

				$tag = uniqid(),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; }
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$depthAsInteger = rand(1, 3),
				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) use ($depthAsInteger) {
					$aRecipient->unsignedIntegerIs($depthAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
				->string($buffer)
					->isEqualTo(PHP_EOL. str_repeat("	", $depthAsInteger) . $tag)
		;
	}

	function testRecipientOfDecoratorForJsonPartIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depth = new mockOfScore\serializer\keyValue\json\depth,
					$line = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
				),
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, $line))
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->never

			->given(
				$nextDepth = new mockOfScore\serializer\keyValue\json\depth,
				$this->calling($depth)->recipientOfNextDepthIs = function($aRecipient) use ($nextDepth) {
					$aRecipient->jsonDepthIs($nextDepth);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, $line))
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->withArguments($this->newTestedInstance($nextDepth))
							->once
		;
	}
}
