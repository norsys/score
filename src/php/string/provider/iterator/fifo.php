<?php namespace norsys\score\php\string\provider\iterator;

use norsys\score\container;
use norsys\score\container\iterator;
use norsys\score\php\string\{
	provider,
	recipient
};

class fifo
	implements
		provider
{
	private
		$providers
	;

	function __construct(provider... $providers)
	{
		$this->providers = $providers ?: [];
	}

	function recipientOfStringis(recipient $recipient) :void
	{
		(
			new container\fifo(... $this->providers)
		)
			->blockForIteratorIs(
				new iterator\block\functor(
					function($iterator, $provider) use ($recipient)
					{
						$provider->recipientOfStringis($recipient);
					}
				)
			)
		;
	}
}
