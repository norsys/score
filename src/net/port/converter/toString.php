<?php namespace norsys\score\net\port\converter;

use norsys\score\{
	net\port,
	php\string\recipient
};

interface toString
{
	function recipientOfNetPortAsStringIs(port $port, recipient $recipient) :void;
}
