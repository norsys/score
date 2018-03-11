<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, text as text, part };
use norsys\score\serializer\keyValue as serializer;

class any extends text\fromString
	implements
		license
{
	function __construct(string $license)
	{
		parent::__construct(new part\name\license, $license);
	}
}
