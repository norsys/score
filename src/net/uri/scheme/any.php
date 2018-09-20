<?php namespace norsys\score\net\uri\scheme;

use norsys\score\{
	php,
	net\port,
	net\uri\scheme
};

class any extends php\string\lowercase
	implements
		scheme
{
	private $port;

	function __construct(string $string, port $port)
	{
		parent::__construct($string);

		$this->port = $port;
	}

	function recipientOfPortInUriSchemeAsStringFromConverterIs(port\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$converter->recipientOfNetPortAsStringIs($this->port, $recipient);
	}
}
