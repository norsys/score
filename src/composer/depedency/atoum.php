<?php namespace norsys\score\composer\depedency;

class atoum extends any
{
	function __construct(version $version)
	{
		parent::__construct(new name\atoum, $version);
	}
}
