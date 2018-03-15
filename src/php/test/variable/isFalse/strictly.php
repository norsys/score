<?php namespace norsys\score\php\test\variable\isFalse;

use norsys\score\php\test\{ variable\any as anyTest, isFalse };

class strictly extends anyTest
{
	function __construct($variable)
	{
		parent::__construct($variable, new isFalse\strictly);
	}
}
