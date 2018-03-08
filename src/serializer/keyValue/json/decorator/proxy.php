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

	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void
	{
		$recipient->stringIs($separator);
	}

	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void
	{
		$recipient->stringIs($separator);
	}

	function recipientOfDecoratedJsonCloseTagIs(string $openTag, recipient $recipient) :void
	{
		$recipient->stringIs($openTag);
	}

	function recipientOfDecoratedJsonOpenTagIs(string $openTag, recipient $recipient) :void
	{
		$recipient->stringIs($openTag);
	}

	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void
	{
		$recipient->jsonDecoratorIs($this);
	}
}
