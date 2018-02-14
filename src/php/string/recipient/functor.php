<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;

class functor extends php\block\functor
	implements
		php\string\recipient
{
	function stringIs(string $string) :void
	{
		parent::blockArgumentsAre($string);
	}
}
