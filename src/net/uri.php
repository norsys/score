<?php namespace norsys\score\net;

use norsys\score\{
	net\uri\converter,
	php\string\recipient
};

interface uri
{
	function recipientOfUriAsStringFromConverterIs(converter\toString $converter, recipient $recipient) :void;
}
