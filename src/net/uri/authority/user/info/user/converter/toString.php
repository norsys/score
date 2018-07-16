<?php namespace norsys\score\net\uri\authority\user\info\user\converter;

use norsys\score\{
	net\uri\authority\user\info\user,
	php\string\recipient
};

interface toString
{
	function recipientOfUserInUriAuthorityAsStringIs(user $user, recipient $recipient) :void;
}
