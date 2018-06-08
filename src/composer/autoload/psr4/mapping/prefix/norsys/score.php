<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix\norsys;

use norsys\score\composer\autoload\psr4\mapping\prefix\norsys;
use norsys\score\php\identifier;

class score extends norsys
{
	function __construct()
	{
		parent::__construct(new identifier\any('score'));
	}
}
