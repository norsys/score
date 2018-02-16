<?php namespace norsys\score\composer\depedency\name;

use norsys\score\{ composer\depedency, php };

class any extends php\string\any
	implements
		depedency\name
{
	function __construct(string $string)
	{
		if (! $string)
		{
			throw new \invalidArgumentException('Composer depedency name must not be an empty string');
		}

		parent::__construct($string);
	}
}
