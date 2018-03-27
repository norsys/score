<?php namespace norsys\score\composer\autoload\classmap\filename;

use norsys\score\composer\{ autoload\classmap\filename, part };
use norsys\score\composer\autoload\classmap\filename\file;
use norsys\score\fs\path\filename\ext4NtfsHfsPlus;

class symfony extends part\text\anArray\fifo
	implements
		filename
{
	function __construct()
	{
		parent::__construct(
			new file(new ext4NtfsHfsPlus('app'), new ext4NtfsHfsPlus('Appkernel.php')),
			new file(new ext4NtfsHfsPlus('app'), new ext4NtfsHfsPlus('AppCache.php'))
		);
	}
}
