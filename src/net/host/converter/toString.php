<?php namespace norsys\score\net\host\converter;

use norsys\score\{
	net\host,
	php\string\recipient
};

interface toString
{
	function recipientOfHostInUriAuthorityAsStringIs(host $host, recipient $recipient) :void;
}
