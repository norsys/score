<?php namespace norsys\score\composer\config\writer;

use norsys\score\{ composer, php };

interface depedencies
{
	function recipientOfStringForDepedenciesFromComposerDepedenciesIs(composer\depedency\container $depedencies, php\string\recipient $recipient) :void;
}
