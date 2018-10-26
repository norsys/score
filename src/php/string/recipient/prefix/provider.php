<?php namespace norsys\score\php\string\recipient\prefix;

use norsys\score\{ php, php\string\recipient, php\string\recipient\suffix };

class provider
	implements
		recipient
{
	private
		$prefix,
		$recipient
	;

	function __construct(php\string\provider $prefix, recipient $recipient)
	{
		$this->prefix = $prefix;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		$this->prefix
			->recipientOfStringIs(
				new suffix(
					$string,
					$this->recipient
				)
			)
		;
	}
}
