<?php namespace norsys\score\composer\required;

use norsys\score\composer\part\{ object\any, name };
use norsys\score\composer\required;
use norsys\score\composer\depedency;
use norsys\score\serializer\keyValue as serializer;


class dev extends depedencies
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(new name\required\dev, ... $depedencies);
	}
}
