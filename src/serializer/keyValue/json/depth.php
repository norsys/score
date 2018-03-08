<?php namespace norsys\score\serializer\keyValue\json;

use norsys\score\php\integer\unsigned;

interface depth extends unsigned
{
	function recipientOfNextDepthIs(depth\recipient $recipient) :void;
}
