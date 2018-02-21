<?php namespace norsys\score\composer\depedency\atoum;

use norsys\score\composer\depedency\{ atoum, version\dev\master };

class dev extends atoum
{
	function __construct()
	{
		parent::__construct(new master);
	}
}
