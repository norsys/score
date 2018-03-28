<?php namespace norsys\score\fs\path\recipient;

use norsys\score\fs\{ path\recipient, path };
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function fsPathIs(path $path) :void
	{
		parent::blockArgumentsAre($path);
	}
}
