<?php namespace norsys\score\net\uri\scheme;

use norsys\score\{
	php,
	net\uri\scheme
};

class http extends php\string\any
	implements
		scheme
{
	function __construct()
	{
		parent::__construct('http');
	}
}
