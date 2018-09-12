<?php namespace norsys\score\net\host\tld;

use norsys\score\{
	php,
	net\host
};

class fr extends php\string\any
	implements
		host
{
	function __construct()
	{
		parent::__construct('fr');
	}
}
