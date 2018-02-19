<?php namespace norsys\score\php\integer\unsigned;

use norsys\score\php\integer;

class any extends integer\any
	implements
		integer\unsigned
{
	function __construct(int $value = 0)
	{
		parent::__construct($value);

		if ($value < 0)
		{
			throw new \invalidArgumentException('Argument must be greater than or equal to zero');
		}
	}

	function recipientOfUnsignedIntegerIs(integer\unsigned\recipient $recipient) :void
	{
		parent::recipientOfIntegerIs(
			new integer\recipient\functor(
				function($unsigned) use ($recipient)
				{
					$recipient->unsignedIntegerIs($unsigned);
				}
			)
		);
	}
}
