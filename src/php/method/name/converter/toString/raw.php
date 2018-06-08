<?php namespace norsys\score\php\method\name\converter\toString;

use norsys\score\php\{
	method\name\converter\toString,
	method\name,
	string\recipient
};

class raw
	implements
		toString
{
	function recipientOfPhpMethodNameAsStringIs(name $name, recipient $recipient) :void
	{
		$name->recipientOfStringIs($recipient);
	}
}
