<?php namespace norsys\score\fs;

use norsys\score\php\string\provider;
use norsys\score\fs\path\filename\container\recipient;

interface path extends provider
{
	function recipientOfFilenameContainerFromFsPathIs(recipient $recipient) :void;
}
