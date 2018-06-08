<?php namespace norsys\score\php\method\converter;

use norsys\score\php\{ method, string\recipient };

interface toString
{
	function recipientOfPhpMethodAsStringIs(method $method, recipient $recipient) :void;
}
