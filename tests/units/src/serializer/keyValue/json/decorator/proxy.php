<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class proxy extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\decorator')
		;
	}

	function testRecipientOfDecoratedJsonKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$key = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonKeyIs($key, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($key)
							->once
		;
	}

	function testRecipientOfDecoratedJsonValueIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$value = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($value)
							->once
		;
	}

	function testRecipientOfDecoratedJsonTextInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$text = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonTextInArrayIs($text, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($text)
							->once
		;
	}

	function testRecipientOfDecoratedJsonNameSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$separator = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonNameSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($separator)
							->once
		;
	}

	function testRecipientOfDecoratedJsonValueSeparatorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$separator = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonValueSeparatorIs($separator, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForObjectInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratedJsonCloseTagForObjectInArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForObjectInArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratedJsonOpenTagForArrayIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonOpenTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient,
				$tag = uniqid()
			)
			->if(
				$this->testedInstance->recipientOfDecoratedJsonCloseTagForArrayIs($tag, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($tag)
							->once
		;
	}

	function testRecipientOfDecoratorForJsonPartIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\serializer\keyValue\json\decorator\recipient
			)
			->if(
				$this->testedInstance->recipientOfDecoratorForJsonPartIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('jsonDecoratorIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
