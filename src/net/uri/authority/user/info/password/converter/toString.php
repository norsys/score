<?php namespace norsys\score\net\uri\authority\user\info\password\converter;

use norsys\score\{
	net\uri\authority\user\info\password,
	php\string\recipient
};

interface toString
{
	function recipientOfPasswordInUriAuthorityAsStringIs(password $password, recipient $recipient) :void;
}
