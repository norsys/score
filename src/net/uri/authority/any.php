<?php namespace norsys\score\net\uri\authority;

use norsys\score\{
	net\uri\authority,
	net\uri\authority\user,
	net\host,
	net\port,
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

	function recipientOfUriAuthorityAsStringFromConverterIs(authority\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUriAuthorityAsStringIs($this, $recipient);
	}

	function recipientOfUserInfoInUriAuthorityAsStringFromConverterIs(user\info\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUserInfoInUriAuthorityAsStringIs($this->userInfo, $recipient);
	}

	function recipientOfHostInUriAuthorityAsStringFromConverterIs(host\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfHostInUriAuthorityAsStringIs($this->host, $recipient);
	}

	function recipientOfPortInUriAuthorityAsStringFromConverterIs(port\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfNetPortAsStringIs($this->port, $recipient);
	}
}
