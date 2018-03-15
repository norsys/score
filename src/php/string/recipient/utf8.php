<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\{ string\recipient, test\variable\isTrue\strictly as isTrue, test\recipient\ifTrue\functor as ifTrue };

class utf8
	implements
		recipient
{
	private
		$recipient
	;

	function __construct(recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		(
			new isTrue(
				utf8_decode($string) == $string
			)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use (& $string)
					{
						$string = utf8_encode($string);
					}
				)
			)
		;

		$this->recipient->stringIs($string);
	}
}
