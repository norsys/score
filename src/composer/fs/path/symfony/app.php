<?php namespace norsys\score\composer\fs\path\symfony;

use norsys\score\composer\fs\path\any as path;
use norsys\score\fs\path\container\fifo as container;
use norsys\score\composer\fs\path\filename\any as filename;
use norsys\score\composer\autoload\classmap\path\root;

class app extends root
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
