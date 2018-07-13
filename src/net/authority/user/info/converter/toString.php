<?php namespace norsys\score\net\authority\user\info\converter;

use norsys\score\{php\string\recipient, net\authority\user };

interface toString
{
	function recipientOfUserInfoInUriAsStringIs(user\info $userInfo, recipient $recipient) :void;
}
