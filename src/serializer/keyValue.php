<?php namespace norsys\score\serializer;

use norsys\score\php\string\recipient;
use norsys\score\serializer\{ keyValue\part, keyValue\recipient as serializerRecipient, keyValue\name, keyValue\text };

interface keyValue
{
	function partToSerializeWithNameIs(name $name, part $part) :void;

	function textToSerializeIs(text $text) :void;
	function textToSerializeWithNameIs(name $name, text $text) :void;

	function objectToSerializeIs(part $part) :void;
	function objectToSerializeInArrayIs(part $part) :void;
	function objectToSerializeWithNameIs(name $name, part $part) :void;

	function arrayToSerializeIs(part $part) :void;
	function arrayToSerializeWithNameIs(name $name, part $part) :void;
}
