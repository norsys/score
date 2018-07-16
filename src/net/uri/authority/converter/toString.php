<?php namespace norsys\score\net\uri\authority\converter;

use norsys\score\{
	php\string\recipient,
	net\uri\authority
};

interface toString
{
	function recipientOfUriAuthorityAsStringIs(authority $authority, recipient $recipient) :void;
}
