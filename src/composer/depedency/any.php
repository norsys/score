<?php namespace norsys\score\composer\depedency;

use norsys\score\{ composer, composer\depedency, serializer\keyValue as serializer, php\string\recipient, php\block\functor, php\string\aggregator\all as stringAggregator };

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

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				$this->name,
				$this->version
			)
		;
	}
}
