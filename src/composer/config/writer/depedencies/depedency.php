<?php namespace norsys\score\composer\config\writer\depedencies;

use norsys\score\{ composer, php };

interface depedency
{
	function recipientOfStringForComposerDepedencyIs(composer\depedency $depedency, php\string\recipient $recipient) :void;
}
