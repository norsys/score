<?php namespace norsys\score\net\uri\path\segment\converter;

use norsys\score\{
	net\uri\path\segment,
	php\string\recipient
};

interface toString
{
	function recipientOfSegmentInNetUriPathAsStringIs(segment $segment, recipient $recipient) :void;
}
