<?php namespace norsys\score\composer\scripts\script;

use norsys\score\composer\{
	part\text,
	scripts\script
};
use norsys\score\php;
use norsys\score\serializer\keyValue as serializer;

class any extends php\string\not\blank
	implements
		script
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
		parent::recipientOfStringIs(
			new serializer\string\recipient(
				$serializer
			)
		);
	}
}
