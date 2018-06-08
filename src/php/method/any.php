<?php namespace norsys\score\php\method;

use norsys\score\php\{
	method,
	aClass,
	string\recipient
};

class any
	implements
		method
{
	private
		$class,
		$name
	;

	function __construct(aClass\name $class, method\name $name)
	{
		$this->class = $class;
		$this->name = $name;
	}

	function recipientOfPhpClassNameFromToStringConverterIs(aClass\name\converter\toString $converter, recipient $recipient) :void
	{
		$converter
			->recipientOfPhpClassNameAsStringIs(
				$this->class,
				$recipient
			)
		;
	}

	function recipientOfPhpMethodNameFromToStringConverterIs(method\name\converter\toString $converter, recipient $recipient) :void
	{
		$converter
			->recipientOfPhpMethodNameAsStringIs(
				$this->name,
				$recipient
			)
		;
	}
}
