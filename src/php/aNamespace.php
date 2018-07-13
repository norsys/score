<?php namespace norsys\score\php;

use norsys\score\php\{
	string\provider,
	string\recipient,
	identifier\converter\toString as converter
};

interface aNamespace extends provider
{
	function recipientOfIdentifierFromToStringConverterIs(converter $converter, recipient $recipient) :void;
}
