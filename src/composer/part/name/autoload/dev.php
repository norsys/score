<?php namespace norsys\score\composer\part\name\autoload;

use norsys\score\composer\part\name\{ suffixed, autoload, suffix };

class dev extends suffixed
{
	function __construct()
	{
		parent::__construct(new autoload, new suffix\dev);
	}
}
