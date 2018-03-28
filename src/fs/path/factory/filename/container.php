<?php namespace norsys\score\fs\path\factory\filename;

use norsys\score\fs\path\{ recipient, filename };

interface container
{
	function recipientOfFsPathWithFsPathFilenameFromContainerIs(filename\container $container, recipient $recipient) :void;
}
