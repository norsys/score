<?php namespace norsys\score\net\scheme;

use norsys\score\{
	php,
	net\scheme
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
