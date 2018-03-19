<?php namespace norsys\score\composer\depedency\container;

use norsys\score\composer\depedency;
use norsys\score\composer\part\container;

class fifo extends container\fifo
	implements
		depedency\container
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(... $depedencies);
	}
}
