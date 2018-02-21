<?php namespace norsys\score\composer\depedency\name;

use norsys\score\{ composer\depedency\name, php };

class atoum extends name\any
{
	function __construct(php\string\formater $formater = null)
	{
		parent::__construct(new name\vendor\atoum, new name\project\atoum, $formater);
	}
}
