<?php namespace norsys\score\fs\path\filename\container\filename\recipient;

use norsys\score\fs\path\filename\container\filename\recipient;
use norsys\score\fs\path\filename;
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function fsPathFilenameInContainerAre(filename... $filenames) :void
	{
		parent::blockArgumentsAre(... $filenames);
	}
}
