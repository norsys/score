<?php namespace norsys\score\php\aNamespace\sensio\bundle\distribution;

use norsys\score\php\{
	aNamespace\sensio,
	identifier
};

class bundle extends sensio\bundle
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\sensio\bundle\distribution\bundle, ... $identifiers);
	}

}
