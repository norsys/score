<?php namespace norsys\score\composer\depedency\name;

use norsys\score\php;
use norsys\score\composer\depedency\name\{ vendor, project };

class component extends php\string\not\blank
	implements
		vendor,
		project
{
	function __construct($string, \exception $exception)
	{
		parent::__construct(
			$string,
			$exception
		);

		if (strpos($string, '\'') !== false || strpos($string, '"') !== false)
		{
			throw $exception;
		}
	}

}
