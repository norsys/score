<?php namespace norsys\score\php\identifier\converter\toString;

use norsys\score\php\{
	identifier,
	identifier\converter\toString,
	string\recipient
};

class raw
	implements
		toString
{
	function recipientOfPhpIdentifierAsStringIs(identifier $identifier, recipient $recipient) :void
	{
		$identifier->recipientOfStringIs($recipient);
	}
}
