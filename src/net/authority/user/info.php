<?php namespace norsys\score\net\authority\user;

use norsys\score\{
	net\authority\user\info\user,
	net\authority\user\info\password,
	php\string\recipient
};

interface info
{
	function recipientOfUserInUriFromToStringConverterIs(user\converter\toString $converter, recipient $recipient) :void;
	function recipientOfPasswordInUriFromToStringConverterIs(password\converter\toString $converter, recipient $recipient) :void;
}
