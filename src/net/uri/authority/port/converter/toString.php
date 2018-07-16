<?php namespace norsys\score\net\uri\authority\port\converter;

use norsys\score\{
	net\uri\authority\port,
	php\string\recipient
};

interface toString
{
	function recipientOfPortInUriAuthorityAsStringIs(port $port, recipient $recipient) :void;
}
