<?php namespace norsys\score\net\uri;

use norsys\score\{
	net\uri,
	php\string\recipient
};

class any
	implements
		uri
{
	private
		$scheme,
		$hierPart
	;

	function __construct(uri\scheme $scheme, uri\hierPart $hierPart)
	{
		$this->scheme = $scheme;
		$this->hierPart = $hierPart;
	}

	function recipientOfUriAsStringFromConverterIs(uri\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfNetUriAsStringIs($this, $recipient);
	}

	function recipientOfNetUriSchemeAsStringFromConverterIs(uri\scheme\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfNetUriSchemeAsStringIs($this->scheme, $recipient);
	}

	function recipientOfNetUriHierPartAsStringFromConverterIs(uri\hierPart\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfNetUriHierPartAsStringIs($this->hierPart, $recipient);
	}
}
