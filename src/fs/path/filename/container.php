<?php namespace norsys\score\fs\path\filename;

use norsys\score\container\iterator\block;
use norsys\score\fs\path\filename;

interface container
{
	function blockForContainerIteratorIs(block $block) :void;
	function recipientOfFsPathFilenameInContainerIs(container\filename\recipient $recipient) :void;
}
