<?php namespace norsys\score\php\method\name\converter;

use norsys\score\php\{ method\name, string\recipient };

interface toString
{
	function recipientOfPhpMethodNameAsStringIs(name $name, recipient $recipient) :void;
}
