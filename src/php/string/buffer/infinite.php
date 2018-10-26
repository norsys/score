<?php namespace norsys\score\php\string\buffer;

use norsys\score\php\string\{
	buffer,
	provider,
	recipient
};
use norsys\score\php\test\{
	variable\defined,
	recipient\ifTrue\functor as ifTrue
};

class infinite
	implements
		buffer
{
	private
		$buffer
	;

	function __construct(string $string = null)
	{
		$this->buffer = $string;
	}

	function stringForBufferIs(string $string) :void
	{
		$this->buffer .= $string;
	}

	function recipientOfStringFromBufferIs(recipient $recipient) :void
	{
		(
			new defined($this->buffer)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($recipient)
					{
						$recipient->stringIs($this->buffer);
					}
				)
			)
		;
	}

	function recipientOfStringFromProviderIs(provider $provider, recipient $recipient) :void
	{
		$buffer = clone $this;

		$provider
			->recipientOfStringIs(
				new recipient\functor(
					function($string) use ($buffer)
					{
						$buffer->stringForBufferIs($string);
					}
				)
			)
		;

		$buffer->recipientOfStringFromBufferIs($recipient);
	}
}
