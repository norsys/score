<?php namespace norsys\score\net\port\converter;

use norsys\score\{
	net\port,
	php\string\recipient
};

interface toString
{
	function recipientOfPortInUriAuthorityAsStringIs(port $port, recipient $recipient) :void;
}
