<?php namespace norsys\score\php\namespacing\separator;

use norsys\score\php\namespacing\separator;
use norsys\score\php\string\any;

class official extends any
	implements
		separator
{
	function __construct()
	{
		parent::__construct('\\');
	}
}
