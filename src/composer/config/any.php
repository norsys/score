<?php namespace norsys\score\composer\config;

use norsys\score\composer;

class any
	implements
		composer\config
{
	function recipientOfComposerDepedenciesIs(composer\depedency\container\recipient $recipient) :void
	{
	}
}
