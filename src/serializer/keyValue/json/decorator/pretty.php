<?php namespace norsys\score\serializer\keyValue\json\decorator;

use norsys\score\serializer\keyValue\json\{ decorator, depth };
use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix };
use norsys\score\php\integer\unsigned\recipient\functor as unsignedRecipient;
use norsys\score\php\test\{ variable\isFalse\strictly as isFalse, recipient\ifTrue\functor as ifTrue };

class pretty
	implements
		decorator
{
	private
		$depth,
		$currentLineIsEmpty
	;

	function __construct(depth $depth = null, $currentLineIsEmpty = true)
	{
		$this->depth = $depth ?: new depth\any;
		$this->currentLineIsEmpty = $currentLineIsEmpty;
	}

	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void
	{
		$this->recipientOfStringPrefixedWithEolIs($key, $recipient);
	}

	function recipientOfDecoratedJsonValueIs(string $value, recipient $recipient) :void
	{
		$recipient->stringIs($value);
	}

	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void
	{
		(
			new suffix(
				' ',
				$recipient
			)
		)
			->stringIs($separator)
		;
	}

	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void
	{
		$this->recipientOfStringSuffixedWithEolIs($separator, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringPrefixedWithEolIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringPrefixedWithEolIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringPrefixedWithEolIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStringPrefixedWithEolIs($tag, $recipient);
	}

	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void
	{
		$this->depth
			->recipientOfNextDepthIs(
				new depth\recipient\functor(
					function($nextDepth) use ($recipient) {
						$decorator = clone $this;
						$decorator->depth = $nextDepth;

						$recipient->jsonDecoratorIs($decorator);
					}
				)
			)
		;
	}

	private function recipientOfStringIs(string $string, recipient $recipient) :void
	{
		if ($this->currentLineIsEmpty)
		{
			$this->depth
				->recipientOfUnsignedIntegerIs(
					new unsignedRecipient(
						function($depth) use ($recipient)
						{
							$recipient->stringIs(str_repeat("	", $depth));
						}
					)
				)
			;
		}

		$recipient->stringIs($string);

		$this->currentLineIsEmpty = false;
	}

	private function recipientOfStringPrefixedWithEolIs(string $string, recipient $recipient) :void
	{
		$this->recipientOfEolIs($recipient);
		$this->recipientOfStringIs($string, $recipient);
	}

	private function recipientOfStringSuffixedWithEolIs(string $string, recipient $recipient) :void
	{
		$this->recipientOfStringIs($string, $recipient);
		$this->recipientOfEolIs($recipient);
	}

	private function recipientOfEolIs(recipient $recipient)
	{
		(
			new isFalse(
				$this->currentLineIsEmpty
			)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($recipient)
					{
						$recipient->stringIs(PHP_EOL);

						$this->currentLineIsEmpty = true;
					}
				)
			)
		;
	}
}
