<?php namespace norsys\score\php\aNamespace\sensio\bundle;

use norsys\score\php\{
	aNamespace\sensio\bundle,
	identifier
};

class distribution extends bundle
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\distribution\bundle, ... $identifiers);
	}

}
