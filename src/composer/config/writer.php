<?php namespace norsys\score\composer\config;

use norsys\score\{ composer\config, php };

interface writer
{
	function recipientOfStringForComposerConfigIs(config $config, php\string\recipient $recipient) :void;
}
