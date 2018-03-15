<?php namespace norsys\score\composer\authors\author\role;

use norsys\score\composer\{ authors\author, part\name\author\role, text\fromString };

class any extends fromString
	implements
		author\role
{
	function __construct(string $role)
	{
		parent::__construct(new role, $role);
	}
}
