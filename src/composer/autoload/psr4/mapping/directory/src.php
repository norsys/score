<?php namespace norsys\score\composer\autoload\psr4\mapping\directory;

use norsys\score\fs\path\filename;

class src extends any
{
	function __construct()
	{
		parent::__construct(new filename\ext4NtfsHfsPlus('src'));
	}
}
