<?php namespace norsys\score\serializer\keyValue;

use norsys\score\{ php\string\recipient, serializer\keyValue as serializer, serializer\keyValue\part };

class json
	implements
		serializer
{
	private
		$indentationLevel
	;

	function __construct(int $indentationLevel = 0)
	{
		$this->indentationLevel = $indentationLevel;
	}

	function recipientOfSerializedValueAtKeyIs(string $value, string $key, recipient $recipient) :void
	{
		$recipient->stringIs($this->getKeyFromString($key) . '"' . $value . '"');
	}

	function recipientOfSerializedPartAtKeyIs(part $part, string $key, recipient $recipient) :void
	{
		$clone = clone $this;
		$clone->indentationLevel++;

		$part
			->recipientOfStringMadeWithKeyValueSerializerIs(
				$clone,
				new recipient\functor(
					function($serialized) use ($key, $recipient) {
						$recipient->stringIs($this->getKeyFromString($key) . $serialized);
					}
				)
			)
		;
	}

	private function getKeyFromString(string $string) :string
	{
		return str_repeat("	", $this->indentationLevel) . '"' . addslashes($string) . '": ';
	}
}
