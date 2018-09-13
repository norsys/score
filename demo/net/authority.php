<?php

require __DIR__ . '/../../vendor/autoload.php';

use norsys\score\php\string\recipient\vardump;
use norsys\score\net\{
	host,
	port
};
use norsys\score\net\uri\{
	authority,
	authority\user\info
};

(
	new authority\any(
		new host\any('norsys.fr'),
		new port\http,
		new info\any(
			new info\user\mageekguy,
			new info\password\any('verySecuredPassword')
		)
	)
)
	->recipientOfUriAuthorityAsStringFromConverterIs(
		new authority\converter\toString\rfc3986,
		new vardump
	)
;
