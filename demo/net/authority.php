<?php

require __DIR__ . '/../../vendor/autoload.php';

use norsys\score\php\string\recipient\vardump;
use norsys\score\net\{
	authority,
	authority\host,
	authority\port,
	authority\user\info
};

(
	new authority\any(
		new host\any('norsys.fr'),
		new port\any(80),
		new info\any(
			new info\user\any('mageekguy'),
			new info\password\any('verySecuredPassword')
		)
	)
)
	->recipientOfAuthorityInUriFromToStringConverterIs(
		new authority\converter\toString\rfc3986,
		new vardump
	)
;
