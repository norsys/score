<?php namespace norsys\score\tests\units\composer\depedency\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\part\object };
use mock\norsys\score as mockOfScore;

class infinite extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\container')
			->implements('norsys\score\composer\depedency\container')
			->implements('norsys\score\composer\part')
		;
	}

	function testBlockForIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$iterator = new mockOfScore\container\iterator,
				$block = new mockOfScore\container\iterator\block
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block)
							->once

			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				)
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($iterator, $block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->mock($iterator)
					->receive('variablesForIteratorBlockAre')
						->withArguments($block, $depedency1, $depedency2, $depedency3)
							->once
		;
	}

	function testRecipientOfComposerDepedencyNameIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				),
				$recipient = new mockOfScore\composer\depedency\name\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyNameIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->mock($depedency1)
					->receive('recipientOfComposerDepedencyNameIs')
						->withArguments($recipient)
							->once
				->mock($depedency2)
					->receive('recipientOfComposerDepedencyNameIs')
						->withArguments($recipient)
							->once
				->mock($depedency3)
					->receive('recipientOfComposerDepedencyNameIs')
						->withArguments($recipient)
							->once
		;
	}

	function testRecipientOfComposerDepedencyVersionIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				),
				$recipient = new mockOfScore\composer\depedency\version\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyVersionIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->mock($depedency1)
					->receive('recipientOfComposerDepedencyVersionIs')
						->withArguments($recipient)
							->once
				->mock($depedency2)
					->receive('recipientOfComposerDepedencyVersionIs')
						->withArguments($recipient)
							->once
				->mock($depedency3)
					->receive('recipientOfComposerDepedencyVersionIs')
						->withArguments($recipient)
							->once
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->mock($depedency1)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
				->mock($depedency2)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
				->mock($depedency3)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
		;
	}
}
