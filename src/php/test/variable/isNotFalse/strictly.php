<?php namespace norsys\score\php\test\variable\isNotFalse;

use norsys\score\php\{ test\recipient, test };

class strictly extends test\variable\any
{
	function __construct($variable)
	{
		parent::__construct($variable, new test\isNotFalse\strictly);
	}
}
