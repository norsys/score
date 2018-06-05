<?php namespace norsys\score\composer\root\project\bsd;

use norsys\score\composer\{ root, type, license\bsd };

class threeClause extends root\project
{
	function __construct(root\name $name, root\part... $parts)
	{
		parent::__construct($name, new bsd\threeClause, ... $parts);
	}
}
