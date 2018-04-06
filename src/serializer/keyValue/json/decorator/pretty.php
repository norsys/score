<?php namespace norsys\score\serializer\keyValue\json\decorator;

use norsys\score\serializer\keyValue\json\{ decorator, decorator\pretty\line };
use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix, recipient\functor };
use norsys\score\php\test\{ variable\isFalse\strictly as isFalse, variable\isTrue\strictly as isTrue, recipient\ifTrue\functor as ifTrue };

class pretty
	implements
		decorator
{
	private
		$currentLine,
		$blankLine,
		$notBlankLine
	;

	function __construct(line $currentLine = null, line $blankLine = null, line $notBlankLine = null)
	{
		$this->currentLine = $currentLine ?: new line\blank\not;
		$this->blankLine = $blankLine ?: new line\blank;
		$this->notBlankLine = $notBlankLine ?: new line\blank\not;
	}

	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void
	{
		$this->blankLine->recipientOfStringIs($key, $recipient);

		$this->currentLine = $this->notBlankLine;
	}

	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void
	{
		(
			new suffix(
				' ',
				new functor(
					function($separator) use ($recipient)
					{
						$this->notBlankLine->recipientOfStringIs($separator, $recipient);
					}
				)
			)
		)
			->stringIs($separator)
		;
	}

	function recipientOfDecoratedJsonValueIs(string $value, recipient $recipient) :void
	{
		$this->currentLine->recipientOfStringIs($value, $recipient);
	}

	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void
	{
		$this->notBlankLine->recipientOfStringIs($separator, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$this->currentLine->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$this->blankLine->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonOpenTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$this->currentLine->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratedJsonCloseTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$this->blankLine->recipientOfStringIs($tag, $recipient);
	}

	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void
	{
		$this->blankLine
			->recipientOfJsonLineDecoratorForPartIs(
				new line\recipient\functor(
					function($lineForPart) use ($recipient)
					{
						$decorator = clone $this;
						$decorator->currentLine = $lineForPart;
						$decorator->blankLine = $lineForPart;

						$recipient->jsonDecoratorIs($decorator);
					}
				)
			)
		;
	}
}
