<?php namespace norsys\score\php\integer\unsigned;

use norsys\score\php\{ integer\any as anyInteger, integer\unsigned, integer\recipient\functor, test\variable\isTrue, test\recipient\exception\fallback as exception };

class any extends anyInteger
	implements
		unsigned
{
	function __construct(int $value = 0, \exception $exception = null)
	{
		(
			new isTrue\strictly($value < 0)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('Argument must be greater than or equal to zero'), $exception)
			)
		;

		parent::__construct($value);
	}

	function recipientOfUnsignedIntegerIs(unsigned\recipient $recipient) :void
	{
		parent::recipientOfIntegerIs(
			new functor(
				function($unsigned) use ($recipient)
				{
					$recipient->unsignedIntegerIs($unsigned);
				}
			)
		);
	}
}
