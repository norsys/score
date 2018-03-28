<?php namespace norsys\score\fs\path\filename\unix;

use norsys\score\fs\path\filename\any;

class current extends any
{
	function __construct()
	{
		parent::__construct('.');
	}
}
