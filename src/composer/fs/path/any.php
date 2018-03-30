<?php namespace norsys\score\composer\fs\path;

use norsys\score\composer\fs\path;
use norsys\score\fs\path\unix;

class any extends unix\relative\filename
	implements
		path
{
	function __construct(filename... $filenames)
	{
		parent::__construct(... $filenames);
	}
}
