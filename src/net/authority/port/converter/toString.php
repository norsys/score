<?php namespace norsys\score\net\authority\port\converter;

use norsys\score\{
	net\authority\port,
	php\string\recipient
};

interface toString
{
	function recipientOfPortInUriAsStringIs(port $port, recipient $recipient) :void;
}
