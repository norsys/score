<?php namespace norsys\score\php\string\recipient\surround;

use norsys\score\php\string\{ recipient\surround, recipient };

class parenthesis extends surround
{
	function __construct(recipient $recipient)
	{
		parent::__construct(
			'(',
			')',
			$recipient
		);
	}
}
