<?php namespace norsys\score\php\string\formater;

use norsys\score\php;

class sprintf
	implements
		php\string\formater
{
	private
		$format
	;

	function __construct(string $format)
	{
		$this->format = $format;
	}

	function stringsForRecipientOfFormatedStringAre(php\string\recipient $recipient, string... $strings) :void
	{
		$formatedString = @sprintf($this->format, ...$strings);

		if ($formatedString !== false)
		{
			$recipient->stringIs($formatedString);
		}
	}
}
