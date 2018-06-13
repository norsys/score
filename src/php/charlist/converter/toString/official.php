<?php namespace norsys\score\php\charlist\converter\toString;

use norsys\score\php\{
	charlist,
	string\recipient
};

class official
{
	function recipientOfCharlistAsStringIs(charlist $charlist, recipient $recipient)
	{
		$buffer = new recipient\buffer('');

		$charlist
			->recipientOfMinCharInCharlistIs(
				new recipient\functor(
					function($minChar) use ($charlist, $buffer)
					{
						$buffer->stringIs($minChar);

						$charlist
							->recipientOfMaxCharInCharlistIs(
								new recipient\functor(
									function($maxChar) use ($minChar, $buffer)
									{
										$buffer->stringIs('..');
										$buffer->stringIs($maxChar);
									}
								)
							)
						;
					}
				)
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
