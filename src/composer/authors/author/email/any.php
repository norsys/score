<?php namespace norsys\score\composer\authors\author\email;

use norsys\score\composer\{ authors\author, part\name\author\email, text\fromString };

class any extends fromString
	implements
		author\email
{
	function __construct(string $email)
	{
		parent::__construct(new email, $email);
	}
}
