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

	function testValueToSerializeAtKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$decorator = new mockOfScore\serializer\keyValue\json\decorator,
					$recipient = new mockOfScore\php\string\recipient
				),

				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) {
					$buffer .= $aString;
				},

				$key = uniqid(),
				$value = uniqid()
			)
			->if(
				$this->testedInstance->valueToSerializeAtKeyIs($key, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->variable($buffer)
					->isNull

			->given(
				$this->newTestedInstance($decorator, $recipient),

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"' . $value . '"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$decoratedNameSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($decoratedNameSeparator);
					}
				}
			)
			->if(
				$this->testedInstance->valueToSerializeAtKeyIs($key, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->valueToSerializeAtKeyIs($key, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"foo\"bar"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"bar\"foo"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->valueToSerializeAtKeyIs('foo"bar', 'bar"foo')
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"Ã©"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"Ã©"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->valueToSerializeAtKeyIs('é', 'é')
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)
		;
	}

	function testTextToSerializeWithNameIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$decorator = new mockOfScore\serializer\keyValue\json\decorator,
					$recipient = new mockOfScore\php\string\recipient
				),

				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) {
					$buffer .= $aString;
				},

				$name = new mockOfScore\serializer\keyValue\name,
				$text = new mockOfScore\serializer\keyValue\text
			)
			->if(
				$this->testedInstance->textToSerializeWithNameIs($name, $text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$key = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($key) {
					$aRecipient->stringIs($key);
				},

				$value = uniqid(),
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($value) {
					$aRecipient->stringIs($value);
				},

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"' . $value . '"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$decoratedNameSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($decoratedNameSeparator);
					}
				}
			)
			->if(
				$this->testedInstance->textToSerializeWithNameIs($name, $text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->textToSerializeWithNameIs($name, $text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$key = 'foo"bar',
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($key) {
					$aRecipient->stringIs($key);
				},

				$value = 'bar"foo',
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($value) {
					$aRecipient->stringIs($value);
				},

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"foo\"bar"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"bar\"foo"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->textToSerializeWithNameIs($name, $text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)

			->given(
				$key = 'é',
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($key) {
					$aRecipient->stringIs($key);
				},

				$value = 'é',
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($value) {
					$aRecipient->stringIs($value);
				},

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"Ã©"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"Ã©"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$buffer = null
			)
			->if(
				$this->testedInstance->textToSerializeWithNameIs($name, $text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedValue)
		;
	}

	function testObjectToSerializeAtKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$decorator = new mockOfScore\serializer\keyValue\json\decorator,
					$recipient = new mockOfScore\php\string\recipient
				),

				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) {
					$buffer .= $aString;
				},

				$key = uniqid(),
				$part = new mockOfScore\serializer\keyValue\part
			)
			->if(
				$this->testedInstance->objectToSerializeAtKeyIs($key, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$buffer = null,

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedNameSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($decoratedNameSeparator);
					}
				},

				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				},

				$decoratedOpenTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '{')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
					if ($aTag == '}')
					{
						$aRecipient->stringIs($decoratedCloseTag);
					}
				}
			)
			->if(
				$this->testedInstance->objectToSerializeAtKeyIs($key, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, false))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $decoratedCloseTag)

			->given(
				$partDecorator = new mockOfScore\serializer\keyValue\json\decorator,
				$this->calling($decorator)->recipientOfDecoratorForJsonPartIs = function($aRecipient) use ($partDecorator) {
					$aRecipient->jsonDecoratorIs($partDecorator);
				},

				$partKey = uniqid(),
				$partValue = uniqid(),

				$partDecoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($partKey, $partDecoratedKey) {
					if ($aKey == '"' . $partKey . '"')
					{
						$aRecipient->stringIs($partDecoratedKey);
					}
				},

				$partDecoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($partValue, $partDecoratedValue) {
					if ($aValue == '"' . $partValue . '"')
					{
						$aRecipient->stringIs($partDecoratedValue);
					}
				},

				$partDecoratedNameSeparator = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($partDecoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($partDecoratedNameSeparator);
					}
				},

				$partSerializer = $this->newTestedInstance($partDecorator, $recipient, false),
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $partKey, $partValue) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->valueToSerializeAtKeyIs($partKey, $partValue);
					}
				},

				$this->newTestedInstance(
					$decorator,
					$recipient
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->objectToSerializeAtKeyIs($key, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, false))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedKey . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)

			->given(
				$this->newTestedInstance(
					$decorator,
					$recipient,
					true
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->objectToSerializeAtKeyIs($key, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedKey . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)
		;
	}

	function testObjectToSerializeWithNameIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$decorator = new mockOfScore\serializer\keyValue\json\decorator,
					$recipient = new mockOfScore\php\string\recipient
				),

				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) {
					$buffer .= $aString;
				},

				$name = new mockOfScore\serializer\keyValue\name,
				$part = new mockOfScore\serializer\keyValue\part
			)
			->if(
				$this->testedInstance->objectToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$buffer = null,

				$key = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($key) {
					$aRecipient->stringIs($key);
				},

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedNameSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($decoratedNameSeparator);
					}
				},

				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				},

				$decoratedOpenTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '{')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
					if ($aTag == '}')
					{
						$aRecipient->stringIs($decoratedCloseTag);
					}
				}
			)
			->if(
				$this->testedInstance->objectToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $decoratedCloseTag)

			->given(
				$partDecorator = new mockOfScore\serializer\keyValue\json\decorator,
				$this->calling($decorator)->recipientOfDecoratorForJsonPartIs = function($aRecipient) use ($partDecorator) {
					$aRecipient->jsonDecoratorIs($partDecorator);
				},

				$partKey = uniqid(),
				$partValue = uniqid(),

				$partDecoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($partKey, $partDecoratedKey) {
					if ($aKey == '"' . $partKey . '"')
					{
						$aRecipient->stringIs($partDecoratedKey);
					}
				},

				$partDecoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($partValue, $partDecoratedValue) {
					if ($aValue == '"' . $partValue . '"')
					{
						$aRecipient->stringIs($partDecoratedValue);
					}
				},

				$partDecoratedNameSeparator = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($partDecoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($partDecoratedNameSeparator);
					}
				},

				$partSerializer = $this->newTestedInstance($partDecorator, $recipient, false),
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $partKey, $partValue) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->valueToSerializeAtKeyIs($partKey, $partValue);
					}
				},

				$this->newTestedInstance(
					$decorator,
					$recipient
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->objectToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedKey . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)

			->given(
				$this->newTestedInstance(
					$decorator,
					$recipient,
					true
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->objectToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedKey . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedKey . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)
		;
	}

	function testObjectToSerializeIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$decorator = new mockOfScore\serializer\keyValue\json\decorator,
					$recipient = new mockOfScore\php\string\recipient
				),

				$part = new mockOfScore\serializer\keyValue\part,

				$this->calling($recipient)->stringIs = function($aString) use (& $buffer) {
					$buffer .= $aString;
				}
			)
			->if(
				$this->testedInstance->objectToSerializeIs($part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$buffer = null,

				$decoratedOpenTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '{')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
					if ($aTag == '}')
					{
						$aRecipient->stringIs($decoratedCloseTag);
					}
				}
			)
			->if(
				$this->testedInstance->objectToSerializeIs($part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, false))
				->string($buffer)
					->isEqualTo($decoratedOpenTag . $decoratedCloseTag)

			->given(
				$buffer = null,

				$partDecorator = new mockOfScore\serializer\keyValue\json\decorator,
				$this->calling($decorator)->recipientOfDecoratorForJsonPartIs = function($aRecipient) use ($partDecorator) {
					$aRecipient->jsonDecoratorIs($partDecorator);
				},

				$key = uniqid(),
				$value = uniqid(),

				$decoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"' . $value . '"')
					{
						$aRecipient->stringIs($decoratedValue);
					}
				},

				$decoratedNameSeparator = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonNameSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedNameSeparator) {
					if ($aSeparator == ':')
					{
						$aRecipient->stringIs($decoratedNameSeparator);
					}
				},

				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				},

				$partSerializer = $this->newTestedInstance($partDecorator, $recipient, false),
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $key, $value) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->valueToSerializeAtKeyIs($key, $value);
					}
				},

				$this->newTestedInstance($decorator, $recipient, true)
			)
			->if(
				$this->testedInstance->objectToSerializeIs($part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedOpenTag . $decoratedKey . $decoratedNameSeparator . $decoratedValue . $decoratedCloseTag)
		;
	}
}
