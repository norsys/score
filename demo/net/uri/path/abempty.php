<?php

require __DIR__ . '/../../../../vendor/autoload.php';

use norsys\score\php\string\recipient\vardump;
use norsys\score\net\uri\{
	path\segment,
	path
};

(
	new path\abempty(
		new segment\any('')
	)
)
	->recipientOfSegmentInNetUriPathAsStringFromConverterIs(
		new path\segment\converter\toString\rfc3986,
		new vardump
	)
;


(
	new path\abempty(
		new segment\any('foo')
	)
)
	->recipientOfSegmentInNetUriPathAsStringFromConverterIs(
		new path\segment\converter\toString\rfc3986,
		new vardump
	)
;

(
	new path\abempty(
		new segment\any('foo'),
		new segment\any('bar')
	)
)
	->recipientOfSegmentInNetUriPathAsStringFromConverterIs(
		new path\segment\converter\toString\rfc3986,
		new vardump
	)
;

(
	new path\converter\toString\rfc3986
)
	->recipientOfNetUriPathAsStringIs(
		new path\abempty(
			new segment\any('foo'),
			new segment\any('bar')
		),
		new vardump
	)
;
