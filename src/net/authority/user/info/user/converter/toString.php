<?php namespace norsys\score\net\authority\user\info\user\converter;

use norsys\score\{
	net\authority\user\info\user,
	php\string\recipient
};

interface toString
{
	function recipientOfUserInUriAsStringIs(user $user, recipient $recipient) :void;
}
