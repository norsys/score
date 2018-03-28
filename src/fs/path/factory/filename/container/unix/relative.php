<?php namespace norsys\score\fs\path\factory\filename\container\unix;

use norsys\score\fs\path\factory\filename\container;
use norsys\score\fs\path;
use norsys\score\fs\path\filename;

class relative
	implements container
{
	function recipientOfFsPathWithFsPathFilenameFromContainerIs(filename\container $container, path\recipient $recipient) :void
	{
		$recipient->fsPathIs(new path\unix\relative($container));
	}
}
