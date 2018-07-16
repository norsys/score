<?php namespace norsys\score\net\uri;

use norsys\score\php\string\recipient;

interface authority
{
	function recipientOfUriAuthorityAsStringFromConverterIs(authority\converter\toString $converter, recipient $recipient) :void;
	function recipientOfHostInUriAuthorityAsStringFromConverterIs(authority\host\converter\toString $converter, recipient $recipient) :void;
	function recipientOfPortInUriAuthorityAsStringFromConverterIs(authority\port\converter\toString $converter, recipient $recipient) :void;
	function recipientOfUserInfoInUriAuthorityAsStringFromConverterIs(authority\user\info\converter\toString $converter, recipient $recipient) :void;
}
