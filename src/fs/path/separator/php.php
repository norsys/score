<?php namespace norsys\score\fs\path\separator;

use norsys\score\fs\path\separator;
use norsys\score\php\string\any;

class php extends any
	implements
		separator
{
	function __construct()
	{
		parent::__construct(DIRECTORY_SEPARATOR);
	}
}
