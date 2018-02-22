<?php namespace norsys\score\php\test\variable;

use norsys\score\php\{ test\recipient, test };

class defined extends any
{
	function __construct($variable)
	{
		parent::__construct($variable, new test\defined);
	}
}
