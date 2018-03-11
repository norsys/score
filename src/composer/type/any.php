<?php namespace norsys\score\composer\type;

use norsys\score\composer\text;
use norsys\score\composer\type;
use norsys\score\composer\part;
use norsys\score\serializer\keyValue as serializer;

class any extends text\fromString
	implements
		type
{
	function __construct(string $type)
	{
		parent::__construct(new part\name\type, $type);
	}
}
