<?php namespace norsys\score\serializer\keyValue;

use norsys\score\php\test\{ variable\isTrue\strictly as isTrue, recipient\ifTrue\functor as ifTrue };
use norsys\score\serializer\{ keyValue as serializer, keyValue\part, keyValue\name, keyValue\text, keyValue\json\decorator, keyValue\json\depth };
use norsys\score\php\string\{ recipient, recipient\surround\quotationMark, recipient\functor, recipient\utf8 };

class json
	implements
		serializer
{
	private
		$decorator,
		$recipient,
		$properties
	;

	function __construct(decorator $decorator, recipient $recipient, bool $partial = false)
	{
		$this->decorator = $decorator;
		$this->recipient = $recipient;
		$this->partial = $partial;
	}

	function valueToSerializeAtKeyIs(string $key, string $value) :void
	{
		$this->keyIs($key);

		$this
			->recipientOfQuotedStringIs(
				$value,
				new functor(
					function($value)
					{
						$this->decorator->recipientOfDecoratedJsonValueIs($value, $this->recipient);
					}
				)
			)
		;

		$this->partial = true;
	}

	function textToSerializeWithNameIs(name $name, text $text) :void
	{
		$name
			->recipientOfStringIs(
				new functor(
					function($key) use ($text)
					{
						$text
							->recipientOfStringIs(
								new functor(
									function($value) use ($key)
									{
										$this->valueToSerializeAtKeyIs($key, $value);
									}
								)
							)
						;
					}
				)
			)
		;
	}

	function objectToSerializeAtKeyIs(string $key, part $part) :void
	{
		$this->keyIs($key);

		$this->objectToSerializeIs($part);
	}

	function objectToSerializeIs(part $part) :void
	{
		$this->decorator->recipientOfDecoratedJsonOpenTagIs('{', $this->recipient);
		$this->partIs($part);
		$this->decorator->recipientOfDecoratedJsonCloseTagIs('}', $this->recipient);
	}

	private function recipientOfKeyValueSerializerForPartIs(serializer\recipient $recipient) :void
	{
		$this->decorator
			->recipientOfDecoratorForJsonPartIs(
				new decorator\recipient\functor(
					function($decorator) use ($recipient)
					{
						$serializer = clone $this;
						$serializer->decorator = $decorator;
						$serializer->partial = false;

						$recipient->keyValueSerializerIs($serializer);
					}
				)
			)
		;
	}

	private function partIs(part $part) :void
	{
		$this
			->recipientOfKeyValueSerializerForPartIs(
				new serializer\recipient\functor(
					function($serializer) use ($part)
					{
						$part->keyValueSerializerIs($serializer);
					}
				)
			)
		;
	}

	private function recipientOfQuotedStringIs(string $string, recipient $recipient) :void
	{
		(
			new utf8(
				new quotationMark(
					$recipient
				)
			)
		)
			->stringIs($string)
		;
	}

	private function jsonValueSeparator() :void
	{
		(
			new isTrue(
				$this->partial
			)
		)
			->recipientOfTestIs(
				new ifTrue(
					function()
					{
						$this->decorator->recipientOfDecoratedJsonValueSeparatorIs(',', $this->recipient);
					}
				)
			)
		;
	}

	private function keyIs(string $key) :void
	{
		$this->jsonValueSeparator();

		$this
			->recipientOfQuotedStringIs(
				$key,
				new functor(
					function($key)
					{
						$this->decorator->recipientOfDecoratedJsonKeyIs($key, $this->recipient);
					}
				)
			)
		;

		$this->decorator->recipientOfDecoratedJsonNameSeparatorIs(':', $this->recipient);
	}
}
