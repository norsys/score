<?php namespace norsys\score\composer\autoload\psr4\mapping\directory;

use norsys\score\fs\path\unix;
use norsys\score\composer\fs\path\filename;

class src extends any
{
	function __construct()
	{
		parent::__construct(new unix\relative\filename(new filename('src')));
	}
}
