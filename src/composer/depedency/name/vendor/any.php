<?php namespace norsys\score\composer\depedency\name\vendor;

use norsys\score\{ composer\depedency\name\vendor, php };

class any extends php\string\not\blank
	implements
		vendor
{
	function __construct($string)
	{
		try
		{
			parent::__construct($string);
		}
		catch (\invalidArgumentException $invalidArgumentException)
		{
			throw new \invalidArgumentException('Vendor of composer depedency must not be an empty string and can not contains `"` or `\'`');
		}

		if (strpos($string, '\'') !== false || strpos($string, '"') !== false)
		{
			throw new \invalidArgumentException('Vendor of composer depedency must not be an empty string and can not contains `"` or `\'`');
		}
	}

}
