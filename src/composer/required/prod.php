<?php namespace norsys\score\composer\required;

use norsys\score\composer\{ part\object, required, part\name, depedency };
use norsys\score\serializer\keyValue as serializer;

class prod extends depedencies
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(new name\required, ... $depedencies);
	}
}
