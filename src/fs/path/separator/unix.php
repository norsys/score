<?php namespace norsys\score\fs\path\separator;

class unix extends any
{
	function __construct()
	{
		parent::__construct('/');
	}
}
