<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\json\depth };
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
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; },

				$key = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo($key)

			->given(
				$buffer = null,

				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) {
					$aRecipient->unsignedIntegerIs(0);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo(PHP_EOL . $key)
		;
	}

	function testRecipientOfDecoratedJsonKValueIs()
	{
		$this
			->given(
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),
				$recipient = new mockOfScore\php\string\recipient,
				$value = uniqid()
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
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),
				$recipient = new mockOfScore\php\string\recipient,
				$separator = uniqid()
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
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),
				$recipient = new mockOfScore\php\string\recipient,
				$separator = uniqid()
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

	function testRecipientOfDecoratedJsonOpenTagForObjectIs()
	{
		$this
			->given(
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
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
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; },

				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo($tag)

			->given(
				$buffer = null,

				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) {
					$aRecipient->unsignedIntegerIs(0);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) {
					$aRecipient->unsignedIntegerIs(1);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo(PHP_EOL . "	" . $tag)
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; },

				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo($tag)
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),

				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($string) use (& $buffer) { $buffer .= $string; },

				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo($tag)

			->given(
				$buffer = null,

				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) {
					$aRecipient->unsignedIntegerIs(0);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo(PHP_EOL . $tag)

			->given(
				$buffer = null,

				$this->calling($depth)->recipientOfUnsignedIntegerIs = function($aRecipient) {
					$aRecipient->unsignedIntegerIs(1);
				}
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth, false))
				->string($buffer)
					->isEqualTo(PHP_EOL . "	" . $tag)
		;
	}

	function testRecipientOfDecoratorForJsonPartIs()
	{
		$this
			->given(
				$this->newTestedInstance($depth = new mockOfScore\serializer\keyValue\json\depth),
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depth))
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
					->isEqualTo($this->newTestedInstance($depth))
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->withArguments($this->newTestedInstance($nextDepth))
							->once
		;
	}
}
