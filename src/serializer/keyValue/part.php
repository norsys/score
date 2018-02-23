<?php namespace norsys\score\serializer\keyValue;

use norsys\score\{ serializer\keyValue as serializer, php\string\recipient  };

interface part
{
	function recipientOfStringMadeWithKeyValueSerializerIs(serializer $serializer, recipient $recipient);
}
