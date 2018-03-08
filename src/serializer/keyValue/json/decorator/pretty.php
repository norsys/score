<?php namespace norsys\score\serializer\keyValue\json\decorator;

use norsys\score\serializer\keyValue\json\{ decorator, depth };
use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix };
use norsys\score\php\integer\unsigned\recipient\functor as unsignedRecipient;

class pretty
	implements
		decorator
{
	private
		$depth
	;

	function __construct(depth $depth = null)
	{
		$this->depth = $depth ?: new depth\any;
	}

	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void
	{
		$depth = 0;

		$this->depth
			->recipientOfUnsignedIntegerIs(
				new unsignedRecipient(
					function($currentDepth) use (& $depth)
					{
						$depth = $currentDepth;
					}
				)
			)
		;

		(
			new prefix(
				str_repeat("	", $depth),
				new prefix(
					PHP_EOL,
					$recipient
				)
			)
		)
			->stringIs($key)
		;
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
		$recipient->stringIs($separator);
	}

	function recipientOfDecoratedJsonOpenTagIs(string $openTag, recipient $recipient) :void
	{
		$recipient->stringIs($openTag);
	}

	function recipientOfDecoratedJsonCloseTagIs(string $openTag, recipient $recipient) :void
	{
		$depth = 0;

		$this->depth
			->recipientOfUnsignedIntegerIs(
				new unsignedRecipient(
					function($currentDepth) use (& $depth)
					{
						$depth = $currentDepth;
					}
				)
			)
		;

		(
			new prefix(
				str_repeat("	", $depth),
				new prefix(
					PHP_EOL,
					$recipient
				)
			)
		)
			->stringIs($openTag)
		;
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
}
