<?php namespace norsys\score\composer\config\writer;

use norsys\score\{ composer, php };

interface extra
{
	function recipientOfStringForExtraFromComposerConfigIs(composer\config $config, php\string\recipient $recipient) :void;
}
