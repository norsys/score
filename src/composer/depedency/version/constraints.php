<?php namespace norsys\score\composer\depedency\version;

use norsys\score\{ composer\depedency\version, php, php\test };

class constraints
	implements
		version
{
	private
		$operator,
		$versions
	;

	function __construct(version\constraint\operator $operator, version $version1, version $version2, version... $versions)
	{
		$this->operator = $operator;

		array_unshift($versions, $version1, $version2);

		$this->versions = $versions;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->operator
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($operator) use ($recipient)
					{
						foreach ($this->versions as $version)
						{
							$version
								->recipientOfStringIs(
									new php\string\recipient\functor(
										function($version) use (& $versions)
										{
											$versions[] = $version;
										}
									)
								)
							;
						}

						(new test\defined)
							->recipientOfTestOnVariableIs(
								$versions,
								new test\recipient\ifTrue\functor(
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
