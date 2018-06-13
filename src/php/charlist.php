<?php namespace norsys\score\php;

use norsys\score\php\string\recipient;

interface charlist
{
	function recipientOfMinCharInCharlistIs(recipient $recipient) :void;
	function recipientOfMaxCharInCharlistIs(recipient $recipient) :void;
}
