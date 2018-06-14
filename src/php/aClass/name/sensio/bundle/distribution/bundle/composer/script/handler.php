<?php namespace norsys\score\php\aClass\name\sensio\bundle\distribution\bundle\composer\script;

use norsys\score\php\{
	aClass\name,
	aNamespace,
	identifier
};

class handler extends name\any
{
	function __construct()
	{
		parent::__construct(
			new aNamespace\sensio\bundle\distribution\bundle\composer,
			new identifier\sensio\bundle\distribution\bundle\composer\script\handler
		);
	}
}
