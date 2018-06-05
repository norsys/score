<?php namespace norsys\score\composer\authors\author\name;

use norsys\score\human;
use norsys\score\human\name\{ firstname\any as firstname, lastname\any as lastname };
use norsys\score\composer\authors\author\name;

class mageekguy extends name\human
	implements
		name
{
	function __construct()
	{
		parent::__construct(
			new human\name\firstname\lastname(
				new firstname('Frédéric'),
				new lastname('Hardy')
			)
		);
	}
}
