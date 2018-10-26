<?php namespace norsys\score\php\string\recipient\buffer;

use norsys\score\php\string\{
	recipient,
	buffer
};

class join extends recipient\buffer
{
	private
		$glue
	;

	function __construct(string $glue, string $string = null)
	{
		parent::__construct(new buffer\infinite($string));

		$this->glue = $glue;
	}

	function stringIs(string $string) :void
	{
		parent::recipientOfStringIs(
			new recipient\functor(
				function() {
					parent::stringIs($this->glue);
				}
			)
		);

		parent::stringIs($string);
	}
}
