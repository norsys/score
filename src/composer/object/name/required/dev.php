<?php namespace norsys\score\composer\object\name\required;

use norsys\score\composer\object\name;

class dev extends name\suffixed
{
	function __construct()
	{
		parent::__construct(new name\required, new name\suffix\dev);
	}
}
