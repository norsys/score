<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix\norsys;

use norsys\score\composer\autoload\psr4\mapping\prefix\norsys;
use norsys\score\php\label;

class score extends norsys
{
	function __construct()
	{
		parent::__construct(new label\any('score'));
	}
}
