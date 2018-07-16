<?php namespace norsys\score\net\uri\authority\host\converter;

use norsys\score\{
	net\uri\authority\host,
	php\string\recipient
};

interface toString
{
	function recipientOfHostInUriAuthorityAsStringIs(host $host, recipient $recipient) :void;
}
