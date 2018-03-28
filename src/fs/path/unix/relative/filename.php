<?php namespace norsys\score\fs\path\unix\relative;

use norsys\score\fs\{ path\unix\relative, path };

class filename extends relative
{
	function __construct(path\filename... $filenames)
	{
		parent::__construct(new path\filename\container\fifo(... $filenames));
	}
}
