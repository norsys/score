<?php namespace norsys\score\serializer\keyValue;

use norsys\score\php\test\{
	variable\isTrue\strictly as isTrue,
	recipient\ifTrue\functor as ifTrue
};

use norsys\score\serializer\{
	keyValue as serializer,
	keyValue\part,
	keyValue\name,
	keyValue\text,
	keyValue\json\decorator,
	keyValue\json\depth
};

use norsys\score\php\string\{
	recipient,
	recipient\surround\quotationMark,
	recipient\functor,
	recipient\utf8
};

class json
	implements
		serializer
{
	private
		$decorator,
		$recipient,
		$properties
	;

	function __construct(decorator $decorator, recipient $recipient, bool $separator = false)
	{
		$this->decorator = $decorator;
		$this->recipient = $recipient;
		$this->separator = $separator;
	}

	function partToSerializeWithNameIs(name $name, part $part) :void
	{
		$name
			->recipientOfStringIs(
				new functor(
					function($key) use ($part)
					{
						$this->keyIs($key);

						$part
							->keyValueSerializerIs($this)
						;
					}
				)
			)
		;
	}

	function textToSerializeIs(text $text) :void
	{
		$text
			->recipientOfStringIs(
				new functor(
					function($text)
					{
						$this
							->recipientOfQuotedStringIs(
								$text,
								new functor(
									function($text)
									{
										$this->jsonValueSeparator();

										$this->decorator->recipientOfDecoratedJsonValueIs($text, $this->recipient);

										$this->separator = true;
									}
								)
							)
						;
					}
				)
			)
		;
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

	function objectToSerializeIs(part $part) :void
	{
		$this->jsonValueSeparator();

		$this->decorator->recipientOfDecoratedJsonOpenTagForObjectIs('{', $this->recipient);
		$this->partIs($part);
		$this->decorator->recipientOfDecoratedJsonCloseTagForObjectIs('}', $this->recipient);

		$this->separator = true;
	}

	function objectToSerializeWithNameIs(name $name, part $part) :void
	{
		$name
			->recipientOfStringIs(
				new functor(
					function($key) use ($part)
					{
						$this->keyIs($key);

						$this->objectToSerializeIs($part);

						$this->separator = true;
					}
				)
			)
		;
	}

	function arrayToSerializeIs(part $part) :void
	{
		$this->decorator->recipientOfDecoratedJsonOpenTagForArrayIs('[', $this->recipient);
		$this->partIs($part);
		$this->decorator->recipientOfDecoratedJsonCloseTagForArrayIs(']', $this->recipient);
	}

	function arrayToSerializeWithNameIs(name $name, part $part) :void
	{
		$name
			->recipientOfStringIs(
				new functor(
					function($key) use ($part)
					{
						$this->keyIs($key);

						$this->arrayToSerializeIs($part);

						$this->separator = true;
					}
				)
			)
		;
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
						$serializer->separator = false;

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

	private function valueToSerializeAtKeyIs(string $key, string $value) :void
	{
		$this->keyIs($key);

		$this
			->recipientOfQuotedStringIs(
				$value,
				new functor(
					function($value)
					{
						$this->decorator->recipientOfDecoratedJsonValueIs($value, $this->recipient);

						$this->separator = true;
					}
				)
			)
		;
	}

	private function jsonValueSeparator() :void
	{
		(
			new isTrue(
				$this->separator
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
						$this->decorator->recipientOfDecoratedJsonNameSeparatorIs(':', $this->recipient);
					}
				)
			)
		;

		$this->separator = false;
	}
}
