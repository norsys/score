<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\{ autoload\classmap, part };
use norsys\score\fs\path\filename\{ ext4NtfsHfsPlus, container\fifo };
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
					new ext4NtfsHfsPlus('app'),
					new ext4NtfsHfsPlus('Appkernel.php')
				)
			),
			new classmap\path\file(
				new unix\relative\filename(
					new ext4NtfsHfsPlus('app'),
					new ext4NtfsHfsPlus('AppCache.php')
				)
			)
		);
	}
}
