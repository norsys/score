<?php namespace norsys\score\fs\path\filename\container\factory;

use norsys\score\fs\path\filename\container\{ factory, recipient };
use norsys\score\fs\path\filename;

class fifo
	implements
		factory
{
	function filenamesToBuildContainerOfFsPathFilenameForRecipientAre(recipient $recipient, filename... $filenames) :void
	{
		$recipient->fsPathFilenameContainerIs(new filename\container\fifo(... $filenames));
	}
}
