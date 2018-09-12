<?php namespace norsys\score\net\uri\scheme;

use norsys\score\{
	php,
	net\uri\scheme,
	net\port,
	net\port\converter\toString

};

class http extends php\string\any
	implements
		scheme
{
	function __construct()
	{
		parent::__construct('http');
	}

	function recipientOfPortInUriSchemeAsStringFromConverterIs(toString $converter, php\string\recipient $recipient) :void
	{
		$converter
			->recipientOfPortInUriAuthorityAsStringIs(
				new port\http,
				$recipient
			)
		;
	}
}
