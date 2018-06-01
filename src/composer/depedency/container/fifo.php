<?php namespace norsys\score\composer\depedency\container;

use norsys\score\composer\{
	depedency,
	part\container
};

class fifo extends container\fifo
	implements
		depedency\container
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(... $depedencies);
	}
}
