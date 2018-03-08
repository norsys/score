<?php namespace norsys\score\serializer\keyValue\json\depth;

use norsys\score\{ serializer\keyValue\json\depth, php\integer\unsigned };
use norsys\score\serializer\keyValue\json\depth\recipient;
use norsys\score\php\integer\unsigned\recipient\functor;

class any extends unsigned\any
	implements
		depth
{
	function recipientOfNextDepthIs(recipient $recipient) :void
	{
		parent::recipientOfUnsignedIntegerIs(
			new functor(
				function($unsignedInteger) use ($recipient)
				{
					$recipient->jsonDepthIs(new self($unsignedInteger + 1));
				}
			)
		);
	}
}
