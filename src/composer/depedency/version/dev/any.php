<?php namespace norsys\score\composer\depedency\version\dev;

use norsys\score\{ composer\depedency\version, php, vcs\branch };

class any
	implements
		version
{
	private
		$branch
	;

	function __construct(branch $branch)
	{
		$this->branch = $branch;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->branch
			->recipientOfStringIs(
				new php\string\recipient\prefix('dev-', $recipient)
			)
		;
	}
}
