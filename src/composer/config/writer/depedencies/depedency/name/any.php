<?php namespace norsys\score\composer\config\writer\depedencies\depedency\name;

use norsys\score\{ composer, composer\config\writer, composer\depedency, php };

class any
	implements
		writer\depedencies\depedency\name
{
	function recipientOfStringForComposerDepedencyNameIs(depedency\name $name, php\string\recipient $recipient) :void
	{
		$name
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($name) use ($recipient) {
						$recipient->stringis($name);
					}
				)
			)
		;
	}
}
