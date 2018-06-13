<?php namespace norsys\score\php\aNamespace\sensio\bundle\distribution;

use norsys\score\php\{
	aNamespace\sensio\bundle\distribution,
	identifier
};

class composer extends distribution
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\composer, ... $identifiers);
	}

}
