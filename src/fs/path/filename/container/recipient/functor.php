<?php namespace norsys\score\fs\path\filename\container\recipient;

use norsys\score\fs\path\filename\container;
use norsys\score\php\block;

class functor extends block\functor
	implements
		container\recipient
{
	function fsPathFilenameContainerIs(container $container) :void
	{
		parent::blockArgumentsAre($container);
	}
}
