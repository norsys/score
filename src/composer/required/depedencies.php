<?php namespace norsys\score\composer\required;

use norsys\score\composer\root\part;
use norsys\score\composer\part\{ object, name };
use norsys\score\composer\required;
use norsys\score\composer\depedency;

class depedencies extends object\named
	implements
		required,
		part
{
	function __construct(name $name, depedency... $depedencies)
	{
		parent::__construct($name, new depedency\container\fifo(... $depedencies));
	}
}
