<?php namespace norsys\score\php\string\recipient\stdout;

use norsys\score\php\string\recipient\{ stdout, suffix, functor };

class eol extends stdout
{
	function stringIs(string $string) :void
	{
		(
			new suffix(
				PHP_EOL,
				new functor(
					function($string) {
						parent::stringIs($string);
					}
				)
			)
		)
			->stringIs($string)
		;
	}
}
