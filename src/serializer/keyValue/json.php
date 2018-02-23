<?php namespace norsys\score\serializer\keyValue;

use norsys\score\{ php\string\recipient, serializer\keyValue as serializer, serializer\keyValue\part };

class json
	implements
		serializer
{
	private
		$indentationLevel,
		$pairSeparator
	;

	function __construct(int $indentationLevel = 0, bool $partIsEmpty = true)
	{
		$this->indentationLevel = $indentationLevel;
		$this->pairSeparator = $partIsEmpty ? '' : ',' . PHP_EOL;
	}

	function recipientOfSerializedValueAtKeyIs(string $value, string $key, recipient $recipient) :void
	{
		$recipient->stringIs($this->getKeyFromString($key) . '"' . $value . '"');

		$this->pairSeparator = ',' . PHP_EOL;
	}

	function recipientOfSerializedPartAtKeyIs(part $part, string $key, recipient $recipient) :void
	{
		$clone = clone $this;
		$clone->indentationLevel++;
		$clone->pairSeparator = '';

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
		return $this->pairSeparator . str_repeat("	", $this->indentationLevel) . '"' . addslashes($string) . '": ';
	}
}
