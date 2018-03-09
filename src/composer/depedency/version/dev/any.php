<?php namespace norsys\score\composer\depedency\version\dev;

use norsys\score\composer\depedency\version;
use norsys\score\php\string\{ recipient, recipient\prefix };
use norsys\score\vcs\branch;

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

	function recipientOfStringIs(recipient $recipient) :void
	{
		$this->branch
			->recipientOfStringIs(
				new prefix('dev-', $recipient)
			)
		;
	}
}
