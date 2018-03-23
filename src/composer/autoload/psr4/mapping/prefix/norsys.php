<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix;

use norsys\score\php\label;

class norsys extends official
{
	function __construct(label... $labels)
	{
		parent::__construct(new label\any('norsys'), ... $labels);
	}
}
