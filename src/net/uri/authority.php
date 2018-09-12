<?php namespace norsys\score\net\uri;

use
	norsys\score\php\string\recipient,
	norsys\score\net\port
;

interface authority
{
	function recipientOfUriAuthorityAsStringFromConverterIs(authority\converter\toString $converter, recipient $recipient) :void;
	function recipientOfHostInUriAuthorityAsStringFromConverterIs(authority\host\converter\toString $converter, recipient $recipient) :void;
	function recipientOfPortInUriAuthorityAsStringFromConverterIs(port\converter\toString $converter, recipient $recipient) :void;
	function recipientOfUserInfoInUriAuthorityAsStringFromConverterIs(authority\user\info\converter\toString $converter, recipient $recipient) :void;
}
