<?php namespace norsys\score\composer\license\operator;

class disjunction extends any
{
	function __construct()
	{
		parent::__construct('or');
	}
}
