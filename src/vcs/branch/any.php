<?php namespace norsys\score\vcs\branch;

use norsys\score\{ vcs\branch, php };

class any extends php\string\not\blank
	implements
		branch
{
	function __construct(string $string)
	{
		parent::__construct($string, new \invalidArgumentException('VCS branch must be a not empty string'));
	}
}
