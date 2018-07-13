<?php namespace norsys\score\net;

use norsys\score\php\string\recipient;

interface authority
{
	function recipientOfAuthorityInUriFromToStringConverterIs(authority\converter\toString $converter, recipient $recipient) :void;
	function recipientOfHostInUriFromToStringConverterIs(authority\host\converter\toString $converter, recipient $recipient) :void;
	function recipientOfPortInUriFromToStringConverterIs(authority\port\converter\toString $converter, recipient $recipient) :void;
	function recipientOfUserInfoInUriFromToStringConverterIs(authority\user\info\converter\toString $converter, recipient $recipient) :void;
}
