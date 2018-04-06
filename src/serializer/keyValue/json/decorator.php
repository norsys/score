<?php namespace norsys\score\serializer\keyValue\json;

use norsys\score\php\string\recipient;

interface decorator
{
	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void;
	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void;
	function recipientOfDecoratedJsonValueIs(string $value, recipient $recipient) :void;
	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void;

	function recipientOfDecoratedJsonOpenTagForObjectIs(string $tag, recipient $recipient) :void;
	function recipientOfDecoratedJsonCloseTagForObjectIs(string $tag, recipient $recipient) :void;

	function recipientOfDecoratedJsonOpenTagForArrayIs(string $tag, recipient $recipient) :void;
	function recipientOfDecoratedJsonCloseTagForArrayIs(string $tag, recipient $recipient) :void;

	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void;
}
