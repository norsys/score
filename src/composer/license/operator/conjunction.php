<?php namespace norsys\score\composer\license\operator;

class conjunction extends any
{
	function __construct()
	{
		parent::__construct('and');
	}
}
