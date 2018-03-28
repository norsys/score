<?php namespace norsys\score\fs\path\filename\container;

use norsys\score\fs\path\filename;

interface factory
{
	function filenamesToBuildContainerOfFsPathFilenameForRecipientAre(recipient $recipient, filename... $filenames) :void;
}
