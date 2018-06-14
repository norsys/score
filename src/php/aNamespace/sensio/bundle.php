<?php namespace norsys\score\php\aNamespace\sensio;

use norsys\score\php\{
	aNamespace\sensio,
	identifier
};

class bundle extends sensio
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\sensio\bundle, ... $identifiers);
	}
}
