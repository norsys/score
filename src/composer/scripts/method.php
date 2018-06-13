<?php namespace norsys\score\composer\scripts;

use norsys\score\composer\scripts\part;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php;

class method
	implements
		part
{
	private
		$method,
		$converter
	;

	function __construct(php\method $method, php\method\converter\toString $converter = null)
	{
		$this->method = $method;
		$this->converter = $converter ?: new php\method\converter\toString\official;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->converter
			->recipientOfPhpMethodAsStringIs(
				$this->method,
				new serializer\string\recipient(
					$serializer
				)
			)
		;
	}
}
