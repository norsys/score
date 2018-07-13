<?php namespace norsys\score\net\authority\converter;

use norsys\score\{
	php\string\recipient,
	net\authority
};

interface toString
{
	function recipientOfUriAuthorityAsStringIs(authority $authority, recipient $recipient) :void;
}
