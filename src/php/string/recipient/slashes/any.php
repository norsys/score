<?php namespace norsys\score\php\string\recipient\slashes;

use norsys\score\php\{
	string\recipient,
	charlist
};

class any
	implements
		recipient
{
	private
		$charlist,
		$recipient
	;

	function __construct(charlist $charlist, recipient $recipient)
	{
		$this->charlist = $charlist;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		(
			new charlist\converter\toString\official
		)
			->recipientOfCharlistAsStringIs(
				$this->charlist,
				new recipient\functor(
					function($charlist) use ($string)
					{
						$this->recipient->stringIs(addcslashes($string, $charlist));
					}
				)
			)
		;
	}
}
