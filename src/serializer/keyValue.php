<?php namespace norsys\score\serializer;

use norsys\score\php\string\recipient;
use norsys\score\serializer\{ keyValue\part, keyValue\recipient as serializerRecipient, keyValue\name };

interface keyValue
{
	function valueToSerializeAtKeyIs(string $key, string $value) :void;
	function objectToSerializeAtKeyIs(string $key, part $part) :void;
	function objectToSerializeWithNameIs(name $name, part $part) :void;
	function objectToSerializeIs(part $part) :void;
}
