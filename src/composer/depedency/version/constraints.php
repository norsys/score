<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency\{ version, version\constraint\operator };
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\php\string\{ recipient, recipient\functor, join };
use norsys\score\container\iterator\{ fifo, block\functor as iteratorBlock };

class constraints
	implements
		version
{
	private
		$operator,
		$versions
	;

	function __construct(operator $operator, version $version1, version $version2, version... $versions)
	{
		$this->operator = $operator;

		array_unshift($versions, $version1, $version2);

		$this->versions = $versions;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new join(
				$this->operator,
				... $this->versions
			)
		)
			->recipientOfStringIs(
				new functor(
					function($version) use ($recipient)
					{
						$recipient->stringIs($version);
					}
				)
			)
		;
	}
}
