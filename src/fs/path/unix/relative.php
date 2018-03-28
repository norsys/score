<?php namespace norsys\score\fs\path\unix;

use norsys\score\fs\path\{ unix, filename\unix\current };
use norsys\score\php\string\{ recipient, recipient\prefix };

class relative extends unix
{
	function recipientOfStringIs(recipient $recipient) :void
	{
		parent::recipientOfStringIs(
			new prefix\provider(
				new current,
				$recipient
			)
		);
	}
}
