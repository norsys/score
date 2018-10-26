<?php namespace norsys\score\php\charlist\converter\toString;

use norsys\score\php\{
	charlist,
	string\recipient,
	string\provider,
	string\buffer
};

class official
{
	function recipientOfCharlistAsStringIs(charlist $charlist, recipient $recipient)
	{
		(
			new buffer\infinite('')
		)
			->recipientOfStringFromProviderIs(
				new provider\functor(
					function($recipient) use ($charlist)
					{
						$charlist
							->recipientOfMinCharInCharlistIs(
								new recipient\functor(
									function($minChar) use ($charlist, $recipient)
									{
										$recipient->stringIs($minChar);

										$charlist
											->recipientOfMaxCharInCharlistIs(
												new recipient\prefix(
													'..',
													$recipient
												)
											)
										;
									}
								)
							)
						;
					}
				),
				$recipient
			)
		;
	}
}
