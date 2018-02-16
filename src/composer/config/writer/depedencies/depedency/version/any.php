<?php namespace norsys\score\composer\config\writer\depedencies\depedency\version;

use norsys\score\{ composer\config\writer, php, composer\depedency };

class any
	implements
		writer\depedencies\depedency\version
{
	function recipientOfStringForComposerDepedencyVersionIs(depedency\version $version, php\string\recipient $recipient) :void
	{
		$version
			->recipientOfStringIs($recipient)
		;
	}
}
