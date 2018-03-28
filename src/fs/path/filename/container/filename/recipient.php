<?php namespace norsys\score\fs\path\filename\container\filename;

use norsys\score\fs\path\filename;

interface recipient
{
	function fsPathFilenameInContainerAre(filename... $filenames) :void;
}
