<?php namespace norsys\score\php\aNamespace\converter;

use norsys\score\php\{
	aNamespace,
	string\recipient
};

interface toString
{
	function recipientOfPhpNamespaceAsStringIs(aNamespace $namespace, recipient $recipient) :void;
}
