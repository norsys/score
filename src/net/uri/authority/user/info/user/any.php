<?php namespace norsys\score\net\uri\authority\user\info\user;

use norsys\score\{
	net\uri\authority\user\info\user,
	php
};

class any extends php\string\not\blank
	implements
		user
{
	function __construct(string $value, \exception $exception = null)
	{
		parent::__construct($value, $exception ?: new \invalidArgumentException('User in URI must be a not empty string'));
	}
}
