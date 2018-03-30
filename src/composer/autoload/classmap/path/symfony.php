<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\{ autoload\classmap, part, fs\path\filename\any as filename };
use norsys\score\fs\path\container\fifo;
use norsys\score\fs\path\unix;

class symfony extends part\text\anArray\fifo
	implements
		classmap\path
{
	function __construct()
	{
		parent::__construct(
			new classmap\path\file(
				new unix\relative\filename(
					new filename('app'),
					new filename('Appkernel.php')
				)
			),
			new classmap\path\file(
				new unix\relative\filename(
					new filename('app'),
					new filename('AppCache.php')
				)
			)
		);
	}
}
