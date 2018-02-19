<?php namespace norsys\score\php\integer\converter\toString;

use norsys\score\php;

class identical
	implements
		php\integer\converter\toString
{
	function recipientOfPhpIntegerAsStringIs(php\integer\provider $integer, php\string\recipient $recipient) :void
	{
		$integer
			->recipientOfIntegerIs(
				new php\integer\recipient\functor(
					function($integer) use ($recipient)
					{
						$recipient->stringIs((string) $integer);
					}
				)
			)
		;
	}
}
