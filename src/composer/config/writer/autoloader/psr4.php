<?php namespace norsys\score\composer\config\writer\autoloader;

use norsys\score\{ composer, php };

interface psr4
{
	function recipientOfStringForPsr4AutoloaderFromComposerConfigIs(composer\config $config, php\string\recipient $recipient) :void;
}
