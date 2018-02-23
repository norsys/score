<?php namespace norsys\score\composer\depedency;

use norsys\score\{ composer, composer\depedency, serializer\keyValue as serializer, php\string\recipient, php\string\recipient\functor };

class any
	implements
		depedency
{
	private
		$name,
		$version
	;

	function __construct(depedency\name $name, depedency\version $version)
	{
		$this->name = $name;
		$this->version = $version;
	}

	function recipientOfComposerDepedencyNameIs(depedency\name\recipient $recipient) :void
	{
		$recipient->nameOfComposerDepedencyIs($this->name);
	}

	function recipientOfComposerDepedencyVersionIs(depedency\version\recipient $recipient) :void
	{
		$recipient->versionOfComposerDepedencyIs($this->version);
	}

	function recipientOfStringMadeWithKeyValueSerializerIs(serializer $serializer, recipient $recipient) :void
	{
		$this->name
			->recipientOfStringIs(
				new functor(
					function($name) use ($serializer, $recipient)
					{
						$this->version
							->recipientOfStringIs(
								new functor(
									function($version) use ($name, $serializer, $recipient)
									{
										$serializer
											->recipientOfSerializedValueAtKeyIs(
												$version,
												$name,
												$recipient
											)
										;
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
