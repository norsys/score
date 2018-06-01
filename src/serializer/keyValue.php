<?php namespace norsys\score\serializer;

use norsys\score\serializer\keyValue\{
	part,
	name,
	text
};

interface keyValue
{
	function partToSerializeWithNameIs(name $name, part $part) :void;

	function textToSerializeIs(text $text) :void;
	function textToSerializeWithNameIs(name $name, text $text) :void;

	function objectToSerializeIs(part $part) :void;
	function objectToSerializeWithNameIs(name $name, part $part) :void;

	function arrayToSerializeIs(part $part) :void;
	function arrayToSerializeWithNameIs(name $name, part $part) :void;
}
