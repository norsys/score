<?php namespace norsys\score\php\identifier\sensio\bundle\distribution\bundle;

use norsys\score\php\identifier;

class composer extends identifier\any
{
	function __construct()
	{
		parent::__construct('Composer');
	}
}
