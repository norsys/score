<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\{ recipient, provider, recipient\suffix, recipient\functor };
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
		(
			new prefix(
				$this->string ?: '',
				new functor(
					function($string)
					{
						$this->string = $string;
					}
				)
			)
		)
			->stringIs($string)
		;
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
