<?php namespace norsys\score\php\aNamespace\sensio\bundle\distribution\bundle\composer\script;

use norsys\score\php\{
	aNamespace\sensio\bundle\distribution\bundle\composer,
	identifier
};

class handler extends composer
{
	function __construct(identifier... $identifiers)
	{
		parent::__construct(new identifier\sensio\bundle\distribution\bundle\composer\script\handler, ... $identifiers);
	}
}
