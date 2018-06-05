<?php namespace norsys\score\human\name\converter\toString\firstname;

use norsys\score\human\{ name, name\converter\toString };
use norsys\score\php\{ string\recipient, block };
use norsys\score\trampoline;

class lastname
	implements
		toString
{
	function recipientOfHumanNameAsStringIs(name $name, recipient $recipient) :void
	{
		(
			new trampoline\container\fifo(
				new trampoline\functor(
					function($block) use ($name)
					{
						$name->recipientOfFirstnameAsStringIs(
							new recipient\block($block)
						);
					}
				),
				new trampoline\functor(
					function($block) use ($name)
					{
						$name->recipientOfLastnameAsStringIs(
							new recipient\block($block)
						);
					}
				)
			)
		)
			->argumentsForBlockAre(
				new block\functor(
					function($firstname, $lastname) use ($recipient)
					{
						(
							new recipient\surround(
								$firstname,
								$lastname,
								$recipient
							)
						)
							->stringIs(' ')
						;
					}
				)
			)
		;
	}
}
