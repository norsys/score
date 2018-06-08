<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix;

use norsys\score\php\identifier;

class norsys extends official
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\any('norsys'), ... $identifiers);
	}
}
