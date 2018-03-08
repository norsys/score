<?php namespace norsys\score\composer\depedency\container;

use norsys\score;
use norsys\score\container\{ iterator, iterator\fifo, iterator\block\functor as iteratorBlock };
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\object };
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\functor };
use norsys\score\composer\{ depedency, depedency\name\recipient as nameRecipient, depedency\version\recipient as versionRecipient };

class infinite extends object
	implements
		score\container,
		depedency,
		depedency\container
{
	private
		$depedencies
	;

	function __construct(depedency... $depedencies)
	{
		$this->depedencies = $depedencies;
	}

	function blockForContainerIteratorIs(iterator $iterator, iterator\block $block) :void
	{
		$iterator->variablesForIteratorBlockAre($block, ... $this->depedencies);
	}

	function recipientOfComposerDepedencyNameIs(nameRecipient $recipient) :void
	{
		$this
			->iteratorBlockIsCallable(
				function($iterator, $depedency) use ($recipient) {
					$depedency
						->recipientOfComposerDepedencyNameIs(
							$recipient
						)
					;
				}
			)
		;
	}

	function recipientOfComposerDepedencyVersionIs(versionRecipient $recipient) :void
	{
		$this
			->iteratorBlockIsCallable(
				function($iterator, $depedency) use ($recipient) {
					$depedency
						->recipientOfComposerDepedencyVersionIs(
							$recipient
						)
					;
				}
			)
		;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(new object(... $this->depedencies))->keyValueSerializerIs($serializer);
	}

	private function iteratorBlockIsCallable(callable $callable) :void
	{
		$this
			->blockForContainerIteratorIs(
				new fifo,
				new iteratorBlock(
					$callable
				)
			)
		;
	}
}
