<?php namespace norsys\score\serializer\keyValue\json\decorator;

use norsys\score\serializer\keyValue\json\decorator;
use norsys\score\php\string\recipient;

class proxy
	implements
		decorator
{
	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void
	{
		$recipient->stringIs($key);
	}

	function recipientOfDecoratedJsonValueIs(string $value, recipient $recipient) :void
	{
		$recipient->stringIs($value);
	}

	function recipientOfDecoratedJsonTextInArrayIs(string $text, recipient $recipient) :void
	{
		$recipient->stringIs($text);
	}

	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void
	{
		$recipient->stringIs($separator);
	}

	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void
	{
		$recipient->stringIs($separator);
	}

	function recipientOfDecoratedJsonOpenTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratedJsonCloseTagForObjectIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratedJsonOpenTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratedJsonCloseTagForObjectInArrayIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratedJsonOpenTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratedJsonCloseTagForArrayIs(string $tag, recipient $recipient) :void
	{
		$recipient->stringIs($tag);
	}

	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void
	{
		$recipient->jsonDecoratorIs($this);
	}
}
