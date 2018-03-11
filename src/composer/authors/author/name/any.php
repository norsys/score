<?php namespace norsys\score\composer\authors\author\name;

use norsys\score\composer\{ authors\author, part\name\author\name, text\fromString };
use norsys\score\serializer\keyValue as serializer;

class any extends fromString
	implements
		author\name
{
	function __construct(string $name)
	{
		parent::__construct(new name, $name);
	}
}
