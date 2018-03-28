<?php namespace norsys\score\fs\path\unix;

use norsys\score\fs\{ path\unix, path };

class filename extends unix
{
	function __construct(path\filename... $filenames)
	{
		parent::__construct(new path\filename\container\fifo(... $filenames));
	}
}
