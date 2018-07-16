<?php namespace norsys\score\net\uri\authority\user;

use norsys\score\{
	net\uri\authority\user\info\user,
	net\uri\authority\user\info\password,
	php\string\recipient
};

interface info
{
	function recipientOfUserInUriAuthorityAsStringFromConverterIs(user\converter\toString $converter, recipient $recipient) :void;
	function recipientOfPasswordInUriAuthorityAsStringFromConverterIs(password\converter\toString $converter, recipient $recipient) :void;
}
