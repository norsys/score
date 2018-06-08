<?php namespace norsys\score\php\aNamespace\converter\toString;

use norsys\score\php\{
	identifier,
	aNamespace\converter\toString,
	aNamespace,
	string\recipient
};

class official
	implements
		toString
{
	function recipientOfPhpNamespaceAsStringIs(aNamespace $namespace, recipient $recipient) :void
	{
		$buffer = new recipient\buffer\prefix\provider(new aNamespace\separator\official);

		$namespace
			->recipientOfIdentifierFromToStringConverterIs(
				new identifier\converter\toString\raw,
				$buffer
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
