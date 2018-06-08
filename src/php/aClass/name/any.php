<?php namespace norsys\score\php\aClass\name;

use norsys\score\php\{
	aClass\name,
	aNamespace,
	identifier,
	string\recipient
};

class any
	implements
		name
{
	private
		$namespace,
		$identifier
	;

	function __construct(aNamespace $namespace, identifier $identifier)
	{
		$this->namespace = $namespace;
		$this->identifier = $identifier;
	}

	function recipientOfPhpNamespaceFromToStringConverterIs(aNamespace\converter\toString $converter, recipient $recipient) :void
	{
		$converter
			->recipientOfPhpNamespaceAsStringIs(
				$this->namespace,
				$recipient
			)
		;
	}

	function recipientOfPhpIdentifierFromToStringConverterIs(identifier\converter\toString $converter, recipient $recipient) :void
	{
		$converter
			->recipientOfPhpIdentifierAsStringIs(
				$this->identifier,
				$recipient
			)
		;
	}
}
