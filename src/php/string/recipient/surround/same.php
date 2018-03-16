<?php namespace norsys\score\php\string\recipient\surround;

use norsys\score\php\string\{ recipient\surround, recipient };

class same extends surround
{
	function __construct(string $surround, recipient $recipient)
	{
		parent::__construct($surround, $surround, $recipient);
	}
}
