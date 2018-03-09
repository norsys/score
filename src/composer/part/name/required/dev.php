<?php namespace norsys\score\composer\part\name\required;

use norsys\score\composer\part\name\{ suffixed, required, suffix };

class dev extends suffixed
{
	function __construct()
	{
		parent::__construct(new required, new suffix\dev);
	}
}
