<?php namespace norsys\score\php\string\recipient\suffix;

use norsys\score\{ php, php\string\recipient, php\string\recipient\suffix };


class provider
	implements
		recipient
{
	private
		$provider,
		$recipient
	;

	function __construct(php\string\provider $provider, recipient $recipient)
	{
		$this->provider = $provider;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		$this->provider
			->recipientOfStringIs(
				new recipient\functor(
					function($providerAsString) use ($string)
					{
						(
							new suffix(
								$providerAsString,
								$this->recipient
							)
						)
							->stringIs($string)
						;
					}
				)
			)
		;
	}
}
