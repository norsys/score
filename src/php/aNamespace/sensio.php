<?php namespace norsys\score\php\aNamespace;

use norsys\score\php\identifier;

class sensio extends any
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\any('Sensio'), ... $identifiers);
	}
}
