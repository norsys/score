<?php namespace norsys\score\composer\required;

use norsys\score\composer\root\part;
use norsys\score\composer\part\{ entity, name };
use norsys\score\composer\required;
use norsys\score\composer\depedency;

class depedencies extends entity\named
	implements
		required,
		part
{
	function __construct(name $name, depedency... $depedencies)
	{
		parent::__construct($name, new depedency\container\fifo(... $depedencies));
	}
}
