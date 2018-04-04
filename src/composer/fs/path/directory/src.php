<?php namespace norsys\score\composer\fs\path\directory;

use norsys\score\composer\fs\{ path, path\filename\any as filename };

class src extends path\directory
{
	function __construct()
	{
		parent::__construct(new filename('src'));
	}
}
