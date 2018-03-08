<?php namespace norsys\score\composer\required;

use norsys\score\composer\{ required, depedency\container };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		required
{
	private
		$container
	;

	function __construct(container $container)
	{
		$this->container = $container;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->objectToSerializeAtKeyIs(
				'require',
				$this->container
			)
		;
	}
}
