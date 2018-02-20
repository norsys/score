<?php

# To execute this file, just do `php -f path/to/this/file`.

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../../../../vendor/autoload.php';

use norsys\score\{
	composer\config\writer,
	composer\depedency\version,
	composer\depedency\version\semver,
	php\string\recipient\vardump,
	composer\depedency\any as depedency,
	composer\depedency\name\any as name,
	composer\depedency\version\semver\number\any as number,
	vcs\branch\any as branch
};

$writer = new writer\depedencies\depedency\any(
	new writer\depedencies\depedency\name\any,
	new writer\depedencies\depedency\version\any

);
$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\any(
				new number(2),
				new number(3),
				new number(7)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\major(
				new number(2)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\major\minor(
				new number(2),
				new number(1)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\initial
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\initial(
				new number(5)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\initial(
				new number(5),
				new number(2)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\major\wildcard(
				new number(5)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\major\minor\wildcard(
				new number(2)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new semver\major\minor\wildcard(
				new number(2),
				new number(5)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\range\bc(
				new semver\major\minor\wildcard(
					new number(2),
					new number(5)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\range\bc\no(
				new semver\major\minor\wildcard(
					new number(3)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\range\inclusive(
				new semver\major(
					new number(1)
				),
				new semver\any(
					new number(2),
					new number(1)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\greaterThan(
				new semver\major(
					new number(1)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\greaterThan\orEqualTo(
				new semver\major\minor(
					new number(2),
					new number(5)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\lessThan(
				new semver\major\minor(
					new number(2),
					new number(5)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\lessThan\orEqualTo(
				new semver\major\minor(
					new number(3),
					new number(6)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\not(
				new semver\major\minor(
					new number(3),
					new number(6)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\conjunction(
				new version\greaterThan(
					new semver\major(
						new number(1)
					)
				),
				new version\not(
					new semver\major\minor(
						new number(3),
						new number(6)
					)
				),
				new version\lessThan\orEqualTo(
					new semver\major\minor(
						new number(4),
						new number(2)
					)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\disjunction(
				new version\greaterThan(
					new semver\major(
						new number(1)
					)
				),
				new version\not(
					new semver\major\minor(
						new number(3),
						new number(6)
					)
				),
				new version\lessThan\orEqualTo(
					new semver\major\minor(
						new number(4),
						new number(2)
					)
				)
			)
		),
		new vardump
	)
;

$writer
	->recipientOfStringForComposerDepedencyIs(
		new depedency(
			new name('atoum/atoum'),
			new version\dev\any(
				new branch('a_branch')
			)
		),
		new vardump
	)
;
