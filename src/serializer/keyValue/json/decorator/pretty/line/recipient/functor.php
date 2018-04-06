<?php namespace norsys\score\serializer\keyValue\json\decorator\pretty\line\recipient;

use norsys\score\serializer\keyValue\json\decorator\pretty\{ line, line\recipient };
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function jsonLineDecoratorIs(line $line) :void
	{
		parent::blockArgumentsAre($line);
	}
}
