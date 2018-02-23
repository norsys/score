<?php namespace norsys\score\serializer;

use norsys\score\php\string\recipient;

interface keyValue
{
	function recipientOfSerializedValueAtKeyIs(string $value, string $key, recipient $recipient) :void;
}
