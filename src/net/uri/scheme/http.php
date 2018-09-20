<?php namespace norsys\score\net\uri\scheme;

use norsys\score\{
	php,
	net\uri\scheme,
	net\port,
	net\port\converter\toString

};

class http extends scheme\any
	implements
		scheme
{
	function __construct(port $port = null)
	{
		parent::__construct('http', $port ?: new port\blackhole);
	}
}
