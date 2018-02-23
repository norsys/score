<?php namespace norsys\score\serializer\keyValue;

use norsys\score\{ php\string\recipient, serializer\keyValue as serializer };

class json
	implements
		serializer
{
	function recipientOfSerializedValueAtKeyIs(string $value, string $key, recipient $recipient) :void
	{
		$recipient->stringIs('"' . $key . '": "' . $value . '"');
	}
}
