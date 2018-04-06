<?php namespace norsys\score\serializer\keyValue\json\decorator\pretty\line\blank;

use norsys\score\serializer\keyValue\json\decorator\pretty\line;
use norsys\score\php\string\recipient;

class not
	implements
		line
{
	function recipientOfStringIs(string $string, recipient $recipient) :void
	{
		$recipient->stringIs($string);
	}

	function recipientOfJsonLineDecoratorForPartIs(line\recipient $recipient) :void
	{
		$recipient->jsonLineDecoratorIs($this);
	}
}
