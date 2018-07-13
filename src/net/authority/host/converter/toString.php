<?php namespace norsys\score\net\authority\host\converter;

use norsys\score\{
	net\authority\host,
	php\string\recipient
};

interface toString
{
	function recipientOfHostInUriAsStringIs(host $host, recipient $recipient) :void;
}
