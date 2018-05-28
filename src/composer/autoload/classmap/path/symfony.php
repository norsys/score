<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\fs\path\any as path;
use norsys\score\composer\fs\path\filename\any as filename;
use norsys\score\fs\path\container\fifo as container;

class symfony extends root
{
	function __construct()
	{
		parent::__construct(
			new path(new filename('app')),
			new container(
				new path(new filename('AppKernel.php')),
				new path(new filename('AppCache.php'))
			)
		);
	}
}
