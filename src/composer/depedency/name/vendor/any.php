<?php namespace norsys\score\composer\depedency\name\vendor;

use norsys\score\composer\depedency\name\component;

class any extends component
{
	function __construct($string)
	{
		parent::__construct(
			$string,
			new \invalidArgumentException('Vendor of composer depedency must not be an empty string and can not contains `"` or `\'`')
		);
	}
}
