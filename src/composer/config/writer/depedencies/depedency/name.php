<?php namespace norsys\score\composer\config\writer\depedencies\depedency;

use norsys\score\{ composer\depedency, php };

interface name
{
	function recipientOfStringForComposerDepedencyNameIs(depedency\name $name, php\string\recipient $recipient) :void;
}
