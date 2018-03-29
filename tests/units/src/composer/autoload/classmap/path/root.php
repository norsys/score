<?php namespace norsys\score\tests\units\composer\autoload\classmap\path;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\path;
use norsys\score\composer\autoload\classmap\path\file;
use norsys\score\fs\path\filename\container\fifo;
use norsys\score\fs\path\unix;
use mock\norsys\score as mockOfScore;

class root extends path
{
	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$root = new mockOfScore\fs\path,
					$container = new mockOfScore\fs\path\container
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($root, $container))
				->mock($serializer)
					->receive('textToSerializeIs')
						->never

			->given(
				$filenameFromRoot = new mockOfScore\fs\path\filename,
				$this->calling($root)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($filenameFromRoot) {
					$aRecipient->fsPathFilenameContainerIs(new fifo($filenameFromRoot));
				},

				$filenameFromPath = new mockOfScore\fs\path\filename,

				$path = new mockOfScore\fs\path,
				$this->calling($path)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($filenameFromPath) {
					$aRecipient->fsPathFilenameContainerIs(new fifo($filenameFromPath));
				},

				$filenameFromOtherPath = new mockOfScore\fs\path\filename,

				$otherPath = new mockOfScore\fs\path,
				$this->calling($otherPath)->recipientOfFilenameContainerFromFsPathIs = function($aRecipient) use ($filenameFromOtherPath) {
					$aRecipient->fsPathFilenameContainerIs(new fifo($filenameFromOtherPath));
				},

				$this->calling($container)->blockForContainerIteratorIs = function($aBlock) use ($path, $otherPath) {
					$aBlock->containerIteratorHasValue(new mockOfScore\container\iterator, $path);
					$aBlock->containerIteratorHasValue(new mockOfScore\container\iterator, $otherPath);
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($root, $container))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new file(new unix\relative(new fifo($filenameFromRoot, $filenameFromPath))))
							->once
						->withArguments(new file(new unix\relative(new fifo($filenameFromRoot, $filenameFromOtherPath))))
							->once
		;
	}
}
