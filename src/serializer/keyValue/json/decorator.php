<?php namespace norsys\score\serializer\keyValue\json;

use norsys\score\php\string\recipient;

interface decorator
{
	function recipientOfDecoratedJsonKeyIs(string $key, recipient $recipient) :void;
	function recipientOfDecoratedJsonValueIs(string $value, recipient $recipient) :void;
	function recipientOfDecoratedJsonNameSeparatorIs(string $separator, recipient $recipient) :void;
	function recipientOfDecoratedJsonValueSeparatorIs(string $separator, recipient $recipient) :void;
	function recipientOfDecoratedJsonCloseTagIs(string $openTag, recipient $recipient) :void;
	function recipientOfDecoratedJsonOpenTagIs(string $openTag, recipient $recipient) :void;
	function recipientOfDecoratorForJsonPartIs(decorator\recipient $recipient) :void;
}
