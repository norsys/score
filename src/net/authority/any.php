<?php namespace norsys\score\net\authority;

use norsys\score\{
	net\authority,
	net\authority\user,
	net\authority\host,
	net\authority\port,
	php\string\recipient
};

class any
	implements
		authority
{
	private
		$userInfo
	;

	function __construct(host $host, port $port, user\info $userInfo)
	{
		$this->host = $host;
		$this->port = $port;
		$this->userInfo = $userInfo;
	}

	function recipientOfAuthorityInUriFromToStringConverterIs(authority\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUriAuthorityAsStringIs($this, $recipient);
	}

	function recipientOfUserInfoInUriFromToStringConverterIs(user\info\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUserInfoInUriAsStringIs($this->userInfo, $recipient);
	}

	function recipientOfHostInUriFromToStringConverterIs(host\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfHostInUriAsStringIs($this->host, $recipient);
	}

	function recipientOfPortInUriFromToStringConverterIs(port\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfPortInUriAsStringIs($this->port, $recipient);
	}
}
