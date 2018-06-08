<?php namespace norsys\score\php\identifier\converter;

use norsys\score\php\{
	identifier,
	string\recipient
};

interface toString
{
	function recipientOfPhpIdentifierAsStringIs(identifier $identifier, recipient $recipient) :void;
}
