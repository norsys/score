<?php namespace norsys\score\composer\authors\author\name;

use norsys\score\composer\{ authors\author, part\name\author\name, text\fromString };

class any extends fromString
	implements
		author\name
{
	function __construct(string $name)
	{
		parent::__construct(new name, $name);
	}
}
