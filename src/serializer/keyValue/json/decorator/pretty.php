<?php namespace norsys\score\serializer\keyValue\json\decorator;

use norsys\score\serializer\keyValue\json\{ decorator, depth, decorator\pretty\line };
use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix };
use norsys\score\php\integer\unsigned\recipient\functor;
use norsys\score\php\test\{ variable\isFalse\strictly as isFalse, variable\isTrue\strictly as isTrue, recipient\ifTrue\functor as ifTrue };

class pretty extends proxy
{
	private
		$depth,
		$line
	;

	function __construct(depth $depth = null)
	{
		$this->depth = $depth ?: new depth\any;
	}

	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($key, $recipient);
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

	function recipientOfDecoratedJsonTextInArrayIs(string $text, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($text, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$this->recipientOfStartStringIs($tag, $recipient);
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

	private function recipientOfStartStringIs(string $string, recipient $recipient) :void
	{
		$recipient->stringIs(PHP_EOL);

		$this->depth
			->recipientOfUnsignedIntegerIs(
				new functor(
					function($depth) use ($recipient)
					{
						$recipient->stringIs(str_repeat("	", $depth));
					}
				)
			)
		;

		$recipient->stringIs($string);
	}
}
