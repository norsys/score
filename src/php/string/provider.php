<?php namespace norsys\score\php\string;

use norsys\score\php;

interface provider
{
	function recipientOfStringIs(php\string\recipient $recipient) :void;
}
