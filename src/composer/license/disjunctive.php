<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, license\name };

class disjunctive extends withOperator
{
	function __construct(name... $names)
	{
		parent::__construct(
			new license\operator\disjunction,
			... $names
		);
	}
}
