<?php namespace norsys\score\composer\config;

use norsys\score\composer;

interface reader
{
	function recipientOfComposerDepedenciesIs(composer\depedency\container\recipient $recipient) :void;
}
