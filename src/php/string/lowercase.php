<?php namespace norsys\score\php\string;

class lowercase extends any
{
	function recipientOfStringIs(recipient $recipient) :void
	{
		parent::recipientOfStringIs(
			new recipient\decorator\lowercase(
				$recipient
			)
		);
	}
}
