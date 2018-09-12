<?php namespace norsys\score\net\uri;

use norsys\score\{
	net\port,
	php
};

interface scheme extends php\string\provider
{
	function recipientOfPortInUriSchemeAsStringFromConverterIs(port\converter\toString $converter, php\string\recipient $recipient) :void;
}
