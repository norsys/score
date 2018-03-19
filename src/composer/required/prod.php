<?php namespace norsys\score\composer\required;

use norsys\score\composer\{ part\name, depedency };

class prod extends depedencies
{
	function __construct(depedency... $depedencies)
	{
		parent::__construct(new name\required, ... $depedencies);
	}
}
