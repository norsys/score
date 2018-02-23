<?php namespace norsys\score\php\string\formater;

use norsys\score\{ php\test\variable\isNotFalse, php\test\recipient\ifTrue\functor as ifTrue, php\string\formater, php\string\recipient };

class sprintf
	implements
		formater
{
	private
		$format
	;

	function __construct(string $format)
	{
		$this->format = $format;
	}

	function stringsForRecipientOfFormatedStringAre(recipient $recipient, string... $strings) :void
	{
		(
			new isNotFalse\strictly(
				$formatedString = @sprintf($this->format, ...$strings)
			)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($recipient, $formatedString)
					{
						$recipient->stringIs($formatedString);
					}
				)
			)
		;
	}
}
