<?php namespace norsys\score\net\uri\authority\user\info\user;

use norsys\score\{
	net\uri\authority\user\info\user,
	php\string\recipient
};

class mageekguy
	implements
		user
{
	function recipientOfStringIs(recipient $recipient) :void
	{
		$recipient->stringIs('mageekguy');
	}
}
