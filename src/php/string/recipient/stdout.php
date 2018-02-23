<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\recipient;

class stdout
	implements
		recipient
{
	function stringIs(string $string) :void
	{
		echo $string;
	}
}
