<?php namespace norsys\score\fs\path\filename\container;

use norsys\score\fs\path\filename\container;

interface operator
{
	function recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs(container $container, container $otherContainer, container\recipient $recipient) :void;
}
