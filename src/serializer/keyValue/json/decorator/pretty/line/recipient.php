<?php namespace norsys\score\serializer\keyValue\json\decorator\pretty\line;

use norsys\score\serializer\keyValue\json\decorator\pretty\line;

interface recipient
{
	function jsonLineDecoratorIs(line $line) :void;
}
