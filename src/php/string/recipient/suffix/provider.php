<?php namespace norsys\score\php\string\recipient\suffix;

use norsys\score\{ php, php\string\recipient, php\string\recipient\suffix };


class provider
	implements
		recipient
{
	private
		$suffix,
		$recipient
	;

	function __construct(php\string\provider $suffix, recipient $recipient)
	{
		$this->suffix = $suffix;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		$this->suffix
			->recipientOfStringIs(
				new recipient\functor(
					function($suffixAsString) use ($string)
					{
						(
							new php\string\recipient\prefix(
								$string,
								$this->recipient
							)
						)
							->stringIs($suffixAsString)
						;
					}
				)
			)
		;
	}
}
