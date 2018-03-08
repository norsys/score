<?php namespace norsys\score\serializer\keyValue\json\decorator\recipient;

use norsys\score\serializer\keyValue\json\{ decorator\recipient, decorator };
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function jsonDecoratorIs(decorator $decorator) :void
	{
		parent::blockArgumentsAre($decorator);
	}
}
