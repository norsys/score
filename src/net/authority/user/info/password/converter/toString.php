<?php namespace norsys\score\net\authority\user\info\password\converter;

use norsys\score\{
	net\authority\user\info\password,
	php\string\recipient
};

interface toString
{
	function recipientOfPasswordInUriAsStringIs(password $password, recipient $recipient) :void;
}
