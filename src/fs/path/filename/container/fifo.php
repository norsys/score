<?php namespace norsys\score\fs\path\filename\container;

use norsys\score\fs\path\{ filename\container, filename };
use norsys\score\container\{ iterator\block, iterator };

class fifo
	implements
		container
{
	private
		$filenames
	;

	function __construct(filename... $filenames)
	{
		$this->filenames = $filenames;
	}

	function blockForContainerIteratorIs(block $block) :void
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				$block,
				... $this->filenames
			)
		;
	}

	function recipientOfFsPathFilenameInContainerIs(container\filename\recipient $recipient) :void
	{
		$recipient->fsPathFilenameInContainerAre(... $this->filenames);
	}
}
