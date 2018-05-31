<?php namespace norsys\score\composer\config\platform;

use norsys\score\composer\{ config\option, part\name, part\text };
use norsys\score;
use norsys\score\php\version;
use norsys\score\serializer\keyValue as serializer;

class php
	implements
		constraint
{
	private
		$version,
		$converter
	;

	function __construct(version $version, version\converter\toString $converter = null)
	{
		$this->version = $version;
		$this->converter = $converter ?: new version\converter\toString\official;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->converter
			->recipientOfPhpVersionAsStringIs(
				$this->version,
				new score\php\string\recipient\functor(
					function($version) use ($serializer)
					{
						$serializer
							->textToSerializeWithNameIs(
								new name\php,
								new text\any($version)
							)
						;
					}
				)
			)
		;
	}
}
