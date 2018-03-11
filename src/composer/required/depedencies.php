<?php namespace norsys\score\composer\required;

use norsys\score\composer\part\{ object\any, name };
use norsys\score\composer\required;
use norsys\score\composer\depedency;
use norsys\score\serializer\keyValue as serializer;

class depedencies extends any
	implements
		required
{
	function __construct(name $name, depedency... $depedencies)
	{
		parent::__construct($name, new depedency\container\infinite(... $depedencies));
	}
}
