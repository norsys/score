<?php namespace norsys\score\net\uri\converter;

use norsys\score\{
	net\uri,
	php\string\recipient
};

interface toString
{
	function recipientOfNetUriAsStringIs(uri $uri, recipient $recipient) :void;
}
