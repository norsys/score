<?php namespace norsys\score\php\charlist;

use norsys\score\php\{
	charlist,
	string\recipient
};

class slash
	implements
		charlist
{
	function recipientOfMinCharInCharlistIs(recipient $recipient) :void
	{
		$recipient->stringIs('\\');
	}

	function recipientOfMaxCharInCharlistIs(recipient $recipient) :void
	{
	}
}
