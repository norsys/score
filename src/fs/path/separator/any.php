<?php namespace norsys\score\fs\path\separator;

use norsys\score\fs\path\separator;
use norsys\score\php\string\not;

class any extends not\blank
	implements
		separator
{
	function __construct(string $string, \exception $exception = null)
	{
		parent::__construct($string, $exception ?: new \invalidArgumentException('Path separator must be a not empty string'));
	}
}
