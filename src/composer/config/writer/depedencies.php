<?php namespace norsys\score\composer\config\writer;

use norsys\score\{ composer, php };

interface depedencies
{
	function recipientOfStringForDepedenciesFromComposerConfigIs(composer\config $config, php\string\recipient $recipient) :void;
}
