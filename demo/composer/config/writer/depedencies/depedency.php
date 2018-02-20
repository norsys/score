<?php

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../../../../vendor/autoload.php';

use norsys\score\{ composer\config\writer, composer\depedency, composer\depedency\version\semver, php\string\recipient\vardump };

$writer = new writer\depedencies\depedency\any(
	new writer\depedencies\depedency\name\any,
	new writer\depedencies\depedency\version\any
);

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\any(
				new semver\number\any(2),
				new semver\number\any(3),
				new semver\number\any(7)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\initial
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\initial(
				new semver\number\initial,
				new semver\number\any(5)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\initial(
				new semver\number\any(2),
				new semver\number\any(5)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\major\wildcard(
				new semver\number\initial
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency\any(
			new depedency\name\any('atoum/atoum'),
			new semver\major\minor\wildcard(
				new semver\number\any(2)
			)
		),
		new vardump
	)
;
