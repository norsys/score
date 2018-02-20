<?php namespace norsys\score\composer\depedency\name;

use norsys\score\{ composer\depedency, php };

class any extends php\string\not\blank
	implements
		depedency\name
{
	function __construct(string $string)
	{
		try
		{
			parent::__construct($string);
		}
		catch (\invalidArgumentException $exception)
		{
			throw new \invalidArgumentException('Composer depedency name must not be an empty string');
		}
	}
}
