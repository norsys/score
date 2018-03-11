<?php namespace norsys\score\composer\description;

use norsys\score\composer\text;
use norsys\score\composer\description;
use norsys\score\composer\part;
use norsys\score\serializer\keyValue as serializer;

class any extends text\fromString
	implements
		description
{
	function __construct(string $description)
	{
		parent::__construct(new part\name\description, $description);
	}
}
