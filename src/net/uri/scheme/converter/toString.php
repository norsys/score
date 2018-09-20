<?php namespace norsys\score\net\uri\scheme\converter;

use norsys\score\{
	net\uri\scheme,
	php\string\recipient
};

interface toString
{
	function recipientOfNetUriSchemeAsStringIs(scheme $scheme, recipient $recipient) :void;
}
