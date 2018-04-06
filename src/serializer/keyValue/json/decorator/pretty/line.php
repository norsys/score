<?php namespace norsys\score\serializer\keyValue\json\decorator\pretty;

use norsys\score\php\string\recipient;

interface line
{
	function recipientOfStringIs(string $string, recipient $recipient) :void;
	function recipientOfJsonLineDecoratorForPartIs(line\recipient $recipient) :void;
}
