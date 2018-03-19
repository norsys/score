<?php namespace norsys\score\composer\required;

use norsys\score\composer\part\name;
use norsys\score\composer\depedency;

class dev extends depedencies
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(new name\required\dev, ... $depedencies);
	}
}
