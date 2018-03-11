<?php

# To execute this file, just do `php -f path/to/this/file`.

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../vendor/autoload.php';

use norsys\score\{
	php\string\recipient\stdout,
	composer\config\any as config,
	composer\depedency\version,
	composer\depedency\version\semver,
	composer\name\norsys,
	composer\depedency,
	composer\depedency\atoum,
	composer\required\prod as require_prod,
	composer\required\dev as require_dev,
	composer\depedency\version\semver\number\any as number,
	vcs\branch\any as branch,
	serializer\keyValue\json,
	serializer\keyValue\json\decorator\proxy,
	serializer\keyValue\json\decorator\pretty
};

(
	new config(
		new norsys\score,
		new require_prod(
			new atoum\dev,
			new atoum(
				new version\dev\any(
					new branch('a_branch')
				)
			),
			new atoum(
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
		),
		new require_dev(
			new atoum\dev
		)
	)
)
	->keyValueSerializerIs(
		new json(
			new pretty,
			new stdout
		)
	)
;