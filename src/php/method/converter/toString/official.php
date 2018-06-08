<?php namespace norsys\score\php\method\converter\toString;

use norsys\score\php\{
	aClass,
	method,
	method\converter\toString,
	string\recipient,
	block
};
use norsys\score\trampoline;

class official
	implements
		toString
{
	function recipientOfPhpMethodAsStringIs(method $method, recipient $recipient) :void
	{
		(
			new trampoline\container\fifo(
				new trampoline\functor(
					function($block) use ($method)
					{
						$method
							->recipientOfPhpClassNameFromToStringConverterIs(
								new aClass\name\converter\toString\fqcn,
								new recipient\block($block)
							)
						;
					}
				),
				new trampoline\functor(
					function($block) use ($method)
					{
						$method
							->recipientOfPhpMethodNameFromToStringConverterIs(
								new method\name\converter\toString\raw,
								new recipient\block($block)
							)
						;
					}
				)
			)
		)
			->argumentsForBlockAre(
				new block\functor(
					function($fqcn, $method) use ($recipient)
					{
						(
							new recipient\surround(
								$fqcn,
								$method,
								$recipient
							)
						)
							->stringIs('::')
						;
					}
				)
			)
		;
	}
}
