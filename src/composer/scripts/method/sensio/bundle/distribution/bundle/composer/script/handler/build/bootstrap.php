<?php namespace norsys\score\composer\scripts\method\sensio\bundle\distribution\bundle\composer\script\handler\build;

use norsys\score\{
	php,
	composer\scripts\method
};

class bootstrap extends method
{

	function __construct(php\method\converter\toString $converter = null)
	{
		parent::__construct(
			new php\method\sensio\bundle\distribution\bundle\composer\script\handler\build\bootstrap,
			$converter
		);
	}
}
