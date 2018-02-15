<?php namespace norsys\score\composer\config;

use norsys\score\composer;

class any
	implements
		composer\config
{
	private
		$depedencies
	;

	function __construct(composer\config\reader $reader = null)
	{
		$this->depedencies = new composer\depedency\container\blackhole;

		($reader ?: new composer\config\reader\blackhole)
			->recipientOfComposerDepedenciesIs(
				new composer\depedency\container\recipient\functor(
					function($depedencies)
					{
						$this->depedencies = $depedencies;
					}
				)
			)
		;
	}

	function recipientOfComposerDepedenciesIs(composer\depedency\container\recipient $recipient) :void
	{
		$recipient->composerDepedenciesIs($this->depedencies);
	}
}
