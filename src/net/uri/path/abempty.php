<?php namespace norsys\score\net\uri\path;

use norsys\score\{
	net\uri\path,
	php\string\recipient,
	container\fifo,
	container\iterator\block\functor as block
};

class abempty
	implements
		path
{
	private
		$segments
	;

	function __construct(segment... $segments)
	{
		$this->segments = $segments;
	}

	function recipientOfSegmentInNetUriPathAsStringFromConverterIs(path\segment\converter\toString $converter, recipient $recipient) :void
	{
		$buffer = new recipient\buffer;

		(
			new fifo(
				... $this->segments
			)
		)
			->blockForIteratorIs(
				new block(
					function($iterator, $segment) use ($converter, $buffer) {
						$converter->recipientOfSegmentInNetUriPathAsStringIs($segment, $buffer);
					}
				)
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
