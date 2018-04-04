<?php namespace norsys\score\composer\fs\path;

use norsys\score\php\string\{ recipient, recipient\suffix };
use norsys\score\fs;

class directory extends any
{
	function recipientOfStringIs(recipient $recipient) :void
	{
		parent::recipientOfStringIs(
			new suffix\provider(
				new fs\path\separator\unix,
				$recipient
			)
		);
	}
}
