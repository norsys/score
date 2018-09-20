<?php namespace norsys\score\net\uri;

use norsys\score\{
	net\uri\path\segment,
	php\string\recipient
};

interface path
{
	function recipientOfSegmentInNetUriPathAsStringFromConverterIs(segment\converter\toString $converter, recipient $recipient) :void;
}
