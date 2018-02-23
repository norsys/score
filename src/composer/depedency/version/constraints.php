<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency\{ version, version\constraint\operator };
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\php\string\{ recipient, recipient\functor };
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
		$this->operator
			->recipientOfStringIs(
				new functor(
					function($operator) use ($recipient)
					{
						(new fifo)
							->variablesForIteratorBlockAre(
								new iteratorBlock(
									function($iterator, $version) use (& $versions)
									{
										$version
											->recipientOfStringIs(
												new functor(
													function($version) use (& $versions)
													{
														$versions[] = $version;
													}
												)
											)
										;
									}
								),
								... $this->versions
							)
						;

						(new defined)
							->recipientOfTestOnVariableIs(
								$versions,
								new ifTrue(
									function() use ($recipient, $operator, $versions)
									{
										$recipient->stringIs(join($operator, $versions));
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
