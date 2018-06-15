<?php namespace norsys\score\php\method\sensio\bundle\distribution\bundle\composer\script\handler\build;

use norsys\score\php\{
	method,
	aClass
};

class bootstrap extends method\any
{
	function __construct()
	{
		parent::__construct(
			new aClass\name\sensio\bundle\distribution\bundle\composer\script\handler,
			new method\name\sensio\bundle\distribution\bundle\composer\script\handler\build\bootstrap
		);
	}
}
