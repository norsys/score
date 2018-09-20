<?php namespace norsys\score\net\uri\hierPart\converter;

use norsys\score\{
	net\uri\hierPart,
	php\string\recipient
};

interface toString
{
	function recipientOfNetUriHierPartAsStringIs(hierPart $hierPart, recipient $recipient) :void;
}
