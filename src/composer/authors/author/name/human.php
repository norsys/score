<?php namespace norsys\score\composer\authors\author\name;

use norsys\score;
use norsys\score\php;
use norsys\score\composer\authors\author;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\composer\part\{ name\author\name, text\any as text };

class human
	implements
		author\name
{
	private
		$name,
		$converter
	;

	function __construct(score\human\name $name, score\human\name\converter\toString $converter = null)
	{
		$this->name = $name;
		$this->converter = $converter ?: new score\human\name\converter\toString\firstname\lastname;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->converter
			->recipientOfHumanNameAsStringIs(
				$this->name,
				new php\string\recipient\functor(
					function($name) use ($serializer)
					{
						$serializer
							->textToSerializeWithNameIs(
								new name,
								new text($name)
							)
						;
					}
				)
			)
		;
	}
}
