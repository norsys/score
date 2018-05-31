<?php namespace norsys\score\php\version\number\converter\toString;

use norsys\score\php\{ version\number\converter\toString, string\recipient, version\number };
use norsys\score\php;

class asInteger
	implements
		toString
{
	function recipientOfPhpVersionNumberAsStringIs(number $number, recipient $recipient) :void
	{
		$number
			->recipientOfIntegerIs(
				new php\integer\recipient\functor(
					function($number) use ($recipient)
					{
						$recipient->stringIs((string) $number);
					}
				)
			)
		;
	}
}
