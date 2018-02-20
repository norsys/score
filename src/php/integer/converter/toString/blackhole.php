<?php namespace norsys\score\php\integer\converter\toString;

use norsys\score\{ php, php\integer\converter\toString };

class blackhole
	implements
		toString
{
	function recipientOfPhpIntegerAsStringIs(php\integer\provider $integer, php\string\recipient $recipient) :void
	{
	}
}
