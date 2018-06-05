<?php namespace norsys\score\human\name\firstname;

use norsys\score\human\name;
use norsys\score\php\string\recipient;

class lastname
	implements
		name
{
	private
		$firstname,
		$lastname
	;

	function __construct(name\firstname $firstname, name\lastname $lastname)
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
	}

	function recipientOfFirstnameAsStringIs(recipient $recipient) :void
	{
		$this->firstname
			->recipientOfStringIs($recipient)
		;
	}

	function recipientOfLastnameAsStringIs(recipient $recipient) :void
	{
		$this->lastname
			->recipientOfStringIs($recipient)
		;
	}
}
