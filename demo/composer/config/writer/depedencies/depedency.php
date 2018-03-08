<?php

# To execute this file, just do `php -f path/to/this/file`.

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../../../../vendor/autoload.php';

use norsys\score\{
	php\string\recipient\stdout\eol as stdout,
	php\string\recipient\buffer,
	composer\depedency\version,
	composer\depedency\version\semver,
	composer\depedency,
	composer\required\any as required,
	composer\depedency\version\semver\number\any as number,
	vcs\branch\any as branch,
	serializer\keyValue\json,
	serializer\keyValue\json\decorator\proxy,
	serializer\keyValue\json\decorator\pretty,
	serializer\keyValue\json\depth\any as depth,
	container\iterator\fifo,
	container\iterator\block\functor as block
};

(
	new fifo
)
	->variablesForIteratorBlockAre(
		new block(
			function($iterator, $depedency)
			{
				$depedency
					->keyValueSerializerIs(
						new json(
							new pretty,
							$buffer = new buffer
						)
					)
				;

				$buffer->recipientOfStringIs(new stdout);
			}
		),
		new depedency\atoum(
			new semver\any(
				new number(2),
				new number(3),
				new number(7)
			)
		),
		new depedency\atoum(
			new semver\prefixed(
				new semver\any(
					new number(2),
					new number(3),
					new number(7)
				)
			)
		),
		new depedency\atoum(
			new semver\major(
				new number(2)
			)
		),
		new depedency\atoum(
			new semver\major\minor(
				new number(2),
				new number(1)
			)
		),
		new depedency\atoum(
			new semver\initial
		),
		new depedency\atoum(
			new semver\initial(
				new number(5)
			)
		),
		new depedency\atoum(
			new semver\initial(
				new number(5),
				new number(2)
			)
		),
		new depedency\atoum(
			new semver\major\wildcard(
				new number(5)
			)
		),
		new depedency\atoum(
			new semver\major\minor\wildcard(
				new number(2)
			)
		),
		new depedency\atoum(
			new semver\major\minor\wildcard(
				new number(2),
				new number(5)
			)
		),
		new depedency\atoum(
			new version\range\bc(
				new semver\major\minor\wildcard(
					new number(2),
					new number(5)
				)
			)
		),
		new depedency\atoum(
			new version\range\bc\no(
				new semver\major\minor\wildcard(
					new number(3)
				)
			)
		),
		new depedency\atoum(
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
		new depedency\atoum(
			new version\greaterThan(
				new semver\major(
					new number(1)
				)
			)
		),
		new depedency\atoum(
			new version\greaterThan\orEqualTo(
				new semver\major\minor(
					new number(2),
					new number(5)
				)
			)
		),
		new depedency\atoum(
			new version\lessThan(
				new semver\major\minor(
					new number(2),
					new number(5)
				)
			)
		),
		new depedency\atoum(
			new version\lessThan\orEqualTo(
				new semver\major\minor(
					new number(3),
					new number(6)
				)
			)
		),
		new depedency\atoum(
			new version\not(
				new semver\major\minor(
					new number(3),
					new number(6)
				)
			)
		),
		new depedency\atoum(
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
		new depedency\atoum(
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
		new depedency\atoum(
			new version\dev\any(
				new branch('a_branch')
			)
		),
		new depedency\atoum\dev,
		new required(
			new depedency\container\infinite
			(
				new depedency\atoum\dev,
				new depedency\atoum(
					new version\dev\any(
						new branch('a_branch')
					)
				),
				new depedency\atoum(
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
				)
			)
		)
	)
;
