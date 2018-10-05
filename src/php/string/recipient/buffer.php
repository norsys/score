<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;
use norsys\score\php\{
	string\provider,
	string\recipient,
	block
};

class buffer extends buffer\prefix
	implements
		php\string\buffer
{
	function __construct(string $string = null)
	{
		parent::__construct('', $string);
	}

	function recipientOfStringFromBufferIs(recipient $recipient) :void
	{
		parent::recipientOfStringIs($recipient);
	}

	function stringForBufferIs(string $string) :void
	{
		parent::stringIs($string);
	}

	function recipientOfStringFromProviderIs(provider $provider, recipient $recipient) :void
	{
		$buffer = clone $this;

		$provider->recipientOfStringIs($buffer);

		$buffer->recipientOfStringIs($recipient);
	}
}
