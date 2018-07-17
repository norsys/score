<?php namespace norsys\score\php\string\recipient;

use norsys\score\{
	php\string\recipient,
	container,
	container\iterator
};

class fifo
	implements
		recipient
{
	private
		$recipients
	;

	function __construct(recipient... $recipients)
	{
		$this->recipients = $recipients;
	}

	function stringIs(string $string) :void
	{
		(
			new container\fifo(... $this->recipients)
		)
			->blockForIteratorIs(
				new iterator\block\functor(
					function($iterator, $recipient) use ($string)
					{
						$recipient->stringIs($string);
					}
				)
			)
		;
	}
}
