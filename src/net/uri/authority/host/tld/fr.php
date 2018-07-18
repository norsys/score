<?php namespace norsys\score\net\uri\authority\host\tld;

use norsys\score\{
	php,
	net\uri\authority\host
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
