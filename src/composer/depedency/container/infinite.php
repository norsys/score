<?php namespace norsys\score\composer\depedency\container;

use norsys\score\container\{ iterator, iterator\fifo, iterator\block\functor as iteratorBlock };
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\string\recipient;
use norsys\score\composer\{ depedency, depedency\name\recipient as nameRecipient, depedency\version\recipient as versionRecipient };

class infinite
	implements
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

	function recipientOfStringMadeWithKeyValueSerializerIs(serializer $serializer, recipient $recipient) :void
	{
		$this
			->iteratorBlockIsCallable(
				function($iterator, $depedency) use ($serializer, $recipient) {
					$depedency
						->recipientOfStringMadeWithKeyValueSerializerIs(
							$serializer,
							$recipient
						)
					;
				}
			)
		;
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
