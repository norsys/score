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

	function testPartToSerializeWithNameIs()
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
				$this->testedInstance->partToSerializeWithNameIs($name, $part)
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

				$partText = new mockOfScore\serializer\keyValue\text,
				$partTextAsString = uniqid(),
				$this->calling($partText)->recipientOfStringIs = function($aRecipient) use ($partTextAsString) {
					$aRecipient->stringIs($partTextAsString);
				},

				$partDecoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($partTextAsString, $partDecoratedValue) {
					if ($aValue == '"' . $partTextAsString . '"')
					{
						$aRecipient->stringIs($partDecoratedValue);
					}
				},

				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partText) {
					$aSerializer->textToSerializeIs($partText);
				}
			)
			->if(
				$this->testedInstance->partToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedKey . $decoratedNameSeparator . $partDecoratedValue)
		;
	}

	function testTextToSerializeIs()
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

				$text = new mockOfScore\serializer\keyValue\text
			)
			->if(
				$this->testedInstance->textToSerializeIs($text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$textAsString = uniqid(),
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($textAsString) {
					$aRecipient->stringIs($textAsString);
				},

				$decoratedText = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aText, $aRecipient) use ($textAsString, $decoratedText) {
					if ($aText == '"' . $textAsString . '"')
					{
						$aRecipient->stringIs($decoratedText);
					}
				}
			)
			->if(
				$this->testedInstance->textToSerializeIs($text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedText)

			->given(
				$buffer = null,

				$decoratedValueSeparator = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueSeparatorIs = function($aSeparator, $aRecipient) use ($decoratedValueSeparator) {
					if ($aSeparator == ',')
					{
						$aRecipient->stringIs($decoratedValueSeparator);
					}
				}
			)
			->if(
				$this->testedInstance->textToSerializeIs($text)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedText)

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
				$key = chr(33),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($key) {
					$aRecipient->stringIs($key);
				},

				$value = chr(33),
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($value) {
					$aRecipient->stringIs($value);
				},

				$decoratedKey = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($key, $decoratedKey) {
					if ($aKey == '"' . "\u{0021}" . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($value, $decoratedValue) {
					if ($aValue == '"' . "\u{0021}" . '"')
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
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->variable($buffer)
					->isNull

			->given(
				$buffer = null,

				$decoratedOpenTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagForObjectIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '{')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagForObjectIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
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
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedOpenTag . $decoratedCloseTag)

			->given(
				$buffer = null,

				$partDecorator = new mockOfScore\serializer\keyValue\json\decorator,
				$this->calling($decorator)->recipientOfDecoratorForJsonPartIs = function($aRecipient) use ($partDecorator) {
					$aRecipient->jsonDecoratorIs($partDecorator);
				},

				$name = new mockOfScore\serializer\keyValue\name,
				$nameAsString = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($nameAsString) {
					$aRecipient->stringIs($nameAsString);
				},

				$text = new mockOfScore\serializer\keyValue\text,
				$textAsString = uniqid(),
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($textAsString) {
					$aRecipient->stringIs($textAsString);
				},

				$decoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($nameAsString, $decoratedKey) {
					if ($aKey == '"' . $nameAsString . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($textAsString, $decoratedValue) {
					if ($aValue == '"' . $textAsString . '"')
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
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $name, $text) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->textToSerializeWithNameIs($name, $text);
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
					->isEqualTo($decoratedValueSeparator. $decoratedOpenTag . $decoratedKey . $decoratedNameSeparator . $decoratedValue . $decoratedCloseTag)
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
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagForObjectIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '{')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagForObjectIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
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

				$partName = new mockOfScore\serializer\keyValue\name,
				$partNameAsString = uniqid(),
				$this->calling($partName)->recipientOfStringIs = function($aRecipient) use ($partNameAsString) {
					$aRecipient->stringIs($partNameAsString);
				},

				$partText = new mockOfScore\serializer\keyValue\text,
				$partTextAsString = uniqid(),
				$this->calling($partText)->recipientOfStringIs = function($aRecipient) use ($partTextAsString) {
					$aRecipient->stringIs($partTextAsString);
				},

				$partDecoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($partNameAsString, $partDecoratedKey) {
					if ($aKey == '"' . $partNameAsString . '"')
					{
						$aRecipient->stringIs($partDecoratedKey);
					}
				},

				$partDecoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($partTextAsString, $partDecoratedValue) {
					if ($aValue == '"' . $partTextAsString . '"')
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
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $partName, $partText) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->textToSerializeWithNameIs($partName, $partText);
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

	function testArrayToSerializeWithNameIs()
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
				$this->testedInstance->arrayToSerializeWithNameIs($name, $part)
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

				$decoratedName = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonKeyIs = function($aName, $aRecipient) use ($key, $decoratedName) {
					if ($aName == '"' . $key . '"')
					{
						$aRecipient->stringIs($decoratedName);
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
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagForArrayIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '[')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagForArrayIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
					if ($aTag == ']')
					{
						$aRecipient->stringIs($decoratedCloseTag);
					}
				}
			)
			->if(
				$this->testedInstance->arrayToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedName . $decoratedNameSeparator . $decoratedOpenTag . $decoratedCloseTag)

			->given(
				$partDecorator = new mockOfScore\serializer\keyValue\json\decorator,
				$this->calling($decorator)->recipientOfDecoratorForJsonPartIs = function($aRecipient) use ($partDecorator) {
					$aRecipient->jsonDecoratorIs($partDecorator);
				},

				$partName = new mockOfScore\serializer\keyValue\name,
				$partNameAsString = uniqid(),

				$this->calling($partName)->recipientOfStringIs = function($aRecipient) use ($partNameAsString) {
					$aRecipient->stringIs($partNameAsString);
				},

				$partText = new mockOfScore\serializer\keyValue\text,
				$partTextAsString = uniqid(),

				$this->calling($partText)->recipientOfStringIs = function($aRecipient) use ($partTextAsString) {
					$aRecipient->stringIs($partTextAsString);
				},

				$partDecoratedName = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aName, $aRecipient) use ($partNameAsString, $partDecoratedName) {
					if ($aName == '"' . $partNameAsString . '"')
					{
						$aRecipient->stringIs($partDecoratedName);
					}
				},

				$partDecoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($partTextAsString, $partDecoratedValue) {
					if ($aValue == '"' . $partTextAsString . '"')
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
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $partName, $partText) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->textToSerializeWithNameIs($partName, $partText);
					}
				},

				$this->newTestedInstance(
					$decorator,
					$recipient
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->arrayToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedName . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedName . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)

			->given(
				$this->newTestedInstance(
					$decorator,
					$recipient,
					true
				),

				$buffer = null
			)
			->if(
				$this->testedInstance->arrayToSerializeWithNameIs($name, $part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedValueSeparator . $decoratedName . $decoratedNameSeparator . $decoratedOpenTag . $partDecoratedName . $partDecoratedNameSeparator . $partDecoratedValue .  $decoratedCloseTag)
		;
	}

	function testArrayToSerializeIs()
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
				$this->testedInstance->arrayToSerializeIs($part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient))
				->variable($buffer)
					->isNull

			->given(
				$buffer = null,

				$decoratedOpenTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonOpenTagForArrayIs = function($aTag, $aRecipient) use ($decoratedOpenTag) {
					if ($aTag == '[')
					{
						$aRecipient->stringIs($decoratedOpenTag);
					}
				},

				$decoratedCloseTag = uniqid(),
				$this->calling($decorator)->recipientOfDecoratedJsonCloseTagForArrayIs = function($aTag, $aRecipient) use ($decoratedCloseTag) {
					if ($aTag == ']')
					{
						$aRecipient->stringIs($decoratedCloseTag);
					}
				}
			)
			->if(
				$this->testedInstance->arrayToSerializeIs($part)
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

				$name = new mockOfScore\serializer\keyValue\name,
				$nameAsString = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($nameAsString) {
					$aRecipient->stringIs($nameAsString);
				},

				$text = new mockOfScore\serializer\keyValue\text,
				$textAsString = uniqid(),
				$this->calling($text)->recipientOfStringIs = function($aRecipient) use ($textAsString) {
					$aRecipient->stringIs($textAsString);
				},

				$decoratedKey = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonKeyIs = function($aKey, $aRecipient) use ($nameAsString, $decoratedKey) {
					if ($aKey == '"' . $nameAsString . '"')
					{
						$aRecipient->stringIs($decoratedKey);
					}
				},

				$decoratedValue = uniqid(),
				$this->calling($partDecorator)->recipientOfDecoratedJsonValueIs = function($aValue, $aRecipient) use ($textAsString, $decoratedValue) {
					if ($aValue == '"' . $textAsString . '"')
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
				$this->calling($part)->keyValueSerializerIs = function($aSerializer) use ($partSerializer, $name, $text) {
					if ($aSerializer == $partSerializer)
					{
						$aSerializer->textToSerializeWithNameIs($name, $text);
					}
				},

				$this->newTestedInstance($decorator, $recipient, true)
			)
			->if(
				$this->testedInstance->arrayToSerializeIs($part)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($decorator, $recipient, true))
				->string($buffer)
					->isEqualTo($decoratedOpenTag . $decoratedKey . $decoratedNameSeparator . $decoratedValue . $decoratedCloseTag)
		;
	}
}
