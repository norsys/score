<?php namespace norsys\score\composer\config\writer\depedencies\depedency;

use norsys\score\{ composer\depedency, php };

interface version
{
	function recipientOfStringForComposerDepedencyVersionIs(depedency\version $version, php\string\recipient $recipient) :void;
}
