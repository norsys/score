<?php namespace norsys\score\net\uri\authority\user\info\converter;

use norsys\score\{
	php\string\recipient,
	net\uri\authority\user
};

interface toString
{
	function recipientOfUserInfoInUriAuthorityAsStringIs(user\info $userInfo, recipient $recipient) :void;
}
