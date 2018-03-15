<?php namespace norsys\score\composer\authors\author;

class mageekguy extends any
{
	function __construct()
	{
		parent::__construct(
			new name\any('Frédéric Hardy'),
			new email\any('frederic.hardy@mageekbox.net'),
			new homepage\any('http://blog.mageekbox.net'),
			new role\developer
		);
	}
}
