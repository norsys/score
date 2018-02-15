<?php namespace norsys\score\composer\config\reader;

use norsys\score\composer;

class blackhole
	implements
		composer\config\reader
{
	function recipientOfComposerDepedenciesIs(composer\depedency\container\recipient $recipient) :void
	{
	}
}
