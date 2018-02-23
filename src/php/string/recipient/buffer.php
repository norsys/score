<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\{ recipient, provider };
use norsys\score\php\test\{ variable\defined, recipient\ifTrue\functor as ifTrue };

class buffer
	implements
		recipient,
		provider
{
	private
		$string
	;

	function __construct(string $string = null)
	{
		$this->string = $string;
	}

	function stringIs(string $string) :void
	{
		$this->string .= $string;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new defined($this->string)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($recipient)
					{
						$recipient->stringIs($this->string);
					}
				)
			)
		;
	}
}
