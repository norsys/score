<?php namespace norsys\score\composer\text;

use norsys\score\composer\{ text, part };

class fromString extends text
{
	function __construct(part\name $name, string $string)
	{
		parent::__construct($name, new part\text\any($string));
	}
}
