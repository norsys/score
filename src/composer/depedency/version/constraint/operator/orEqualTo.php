<?php namespace norsys\score\composer\depedency\version\constraint\operator;

use norsys\score\{ composer\depedency\version\constraint\operator, php };

class orEqualTo
	implements
		operator
{
	private
		$operator
	;

	function __construct(operator $operator)
	{
		$this->operator = $operator;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->operator
			->recipientOfStringIs(
				new php\string\recipient\suffix(
					'=',
					$recipient
				)
			)
		;
	}
}
