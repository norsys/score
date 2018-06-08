<?php namespace norsys\score\php\aClass\name\converter\toString;

use norsys\score\php\{
	identifier,
	aNamespace,
	aClass\name\converter\toString,
	aClass\name,
	string\recipient,
	block
};
use norsys\score\trampoline;

class fqcn
	implements
		toString
{
	function recipientOfPhpClassNameAsStringIs(name $name, recipient $recipient) :void
	{
		(
			new trampoline\container\fifo(
				new trampoline\functor(
					function($block) use ($name) {
						$name
							->recipientOfPhpNamespaceFromToStringConverterIs(
								new aNamespace\converter\toString\official,
								new recipient\block($block)
							)
						;
					}
				),
				new trampoline\functor(
					function($block) use ($name) {
						$name
							->recipientOfPhpIdentifierFromToStringConverterIs(
								new identifier\converter\toString\raw,
								new recipient\block($block)
							)
						;
					}
				)
			)
		)
			->argumentsForBlockAre(
				new block\functor(
					function($namespace, $identifier) use ($recipient)
					{
						(
							new recipient\surround(
								$namespace,
								$identifier,
								$recipient
							)
						)
							->stringIs('\\')
						;
					}
				)
			)
		;
	}
}
