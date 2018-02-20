<?php namespace norsys\score\composer\depedency\version\constraint;

use norsys\score\{ composer\depedency\version, php };

class any
	implements
		version
{
	private
		$operator,
		$version
	;

	function __construct(operator $operator, version $version)
	{
		$this->operator = $operator;
		$this->version = $version;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->version
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($version) use ($recipient)
					{
						$this->operator
							->recipientOfStringIs(
								new php\string\recipient\functor(
									function($operator) use ($version, $recipient)
									{
										$recipient->stringIs($operator . $version);
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
