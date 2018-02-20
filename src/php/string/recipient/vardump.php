<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;

class vardump
	implements
		php\string\recipient
{
	function stringIs(string $string) :void
	{
		var_dump($string);
	}
}
