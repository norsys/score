<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, license\name };

class conjunctive extends withOperator
{
	function __construct(name... $names)
	{
		parent::__construct(
			new license\operator\conjunction,
			... $names
		);
	}
}
