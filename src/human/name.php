<?php namespace norsys\score\human;

use norsys\score\php\string\recipient;

interface name
{
	function recipientOfFirstnameAsStringIs(recipient $recipient) :void;
	function recipientOfLastnameAsStringIs(recipient $recipient) :void;
}
