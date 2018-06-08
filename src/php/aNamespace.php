<?php namespace norsys\score\php;

use norsys\score\php\{
	string\recipient,
	identifier\converter\toString as converter
};

interface aNamespace
{
	function recipientOfIdentifierFromToStringConverterIs(converter $converter, recipient $recipient) :void;
}
