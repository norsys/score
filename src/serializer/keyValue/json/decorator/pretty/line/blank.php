<?php namespace norsys\score\serializer\keyValue\json\decorator\pretty\line;

use norsys\score\serializer\keyValue\json\decorator\pretty\line;
use norsys\score\php\integer\unsigned\recipient\functor;
use norsys\score\php;
use norsys\score\php\string\recipient\prefix;
use norsys\score\serializer\keyValue\json\depth;

class blank
	implements
		line
{
	private
		$depth
	;

	function __construct(depth $depth = null)
	{
		$this->depth = $depth ?: new depth\any;
	}

	function recipientOfStringIs(string $string, php\string\recipient $recipient) :void
	{
		$tabulation = '';

		$this->depth
			->recipientOfUnsignedIntegerIs(
				new functor(
					function($depth) use (& $tabulation)
					{
						$tabulation = str_repeat("	", $depth);
					}
				)
			)
		;

		(
			new prefix(
				$tabulation,
				new prefix(
					PHP_EOL,
					$recipient
				)
			)
		)
			->stringIs($string)
		;
	}

	function recipientOfJsonLineDecoratorForPartIs(line\recipient $recipient) :void
	{
		$this->depth
			->recipientOfNextDepthIs(
				new depth\recipient\functor(
					function($depth) use ($recipient)
					{
						$line = clone $this;
						$line->depth = $depth;

						$recipient->jsonLineDecoratorIs($line);
					}
				)
			)
		;
	}
}
