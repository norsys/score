<?php namespace norsys\score\net;

use norsys\score\{
	net\uri,
	php\string\recipient
};

interface uri
{
	function recipientOfNetUriSchemeAsStringFromConverterIs(uri\scheme\converter\toString $converter, recipient $recipient) :void;
	function recipientOfNetUriHierPartAsStringFromConverterIs(uri\hierPart\converter\toString $converter, recipient $recipient) :void;
	function recipientOfUriAsStringFromConverterIs(uri\converter\toString $converter, recipient $recipient) :void;
}
