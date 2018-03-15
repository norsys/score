<?php namespace norsys\score\composer\authors\author\homepage;

use norsys\score\composer\{ authors\author, part\name\author\homepage, text\fromString };

class any extends fromString
	implements
		author\homepage
{
	function __construct(string $homepage)
	{
		parent::__construct(new homepage, $homepage);
	}
}
