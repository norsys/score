<?php namespace norsys\score\php\string\recipient\surround;

use norsys\score\php\string\{ recipient\surround, recipient };

class quotationMark extends surround
{
	function __construct(recipient $recipient)
	{
		parent::__construct('"', $recipient);
	}

	function stringIs(string $string) :void
	{
		parent::stringIs(addslashes($string));
	}
}
