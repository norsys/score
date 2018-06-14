<?php namespace norsys\score\php\aNamespace\sensio\bundle\distribution\bundle;

use norsys\score\php\{
	aNamespace\sensio\bundle\distribution,
	identifier
};

class composer extends distribution\bundle
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\sensio\bundle\distribution\bundle\composer, ... $identifiers);
	}
}
