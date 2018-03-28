<?php namespace norsys\score\fs\path\filename;

use norsys\score\fs\path\filename;
use norsys\score\php\string\not;

class any extends not\blank
	implements
		filename
{
	function __construct(string $string, \exception $exception = null)
	{
		parent::__construct($string, $exception ?: new \invalidArgumentException('Filename must be a not empty string'));
	}
}
