<?php namespace norsys\score\composer\depedency\version\range;

use norsys\score\{ composer\depedency\version, php };

class bc
	implements
		version
{
	private
		$version
	;

	function __construct(version $version)
	{
		$this->version = $version;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->version
			->recipientOfStringIs(
				new php\string\recipient\prefix('~', $recipient)
			)
		;
	}
}
