<?php namespace norsys\score\fs\path\operator\unary\filename;

use norsys\score\fs\path;

class append extends any
{
	function __construct(path $path, path\factory\filename\container $factory)
	{
		parent::__construct($path, $factory, new path\filename\container\operator\append);
	}
}
