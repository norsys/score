<?php

# To execute this file, just do `php -f path/to/this/file`.

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../vendor/autoload.php';

use norsys\score\php\string\recipient\stdout;
use norsys\score\vcs\branch\any as branch;
use norsys\score\fs\path\filename\ext4NtfsHfsPlus as filename;

use norsys\score\composer\{
	part,
	config\any as config,
	depedency\version,
	depedency\version\semver,
	name\norsys,
	type\project,
	license,
	description\any as description,
	authors\any as authors,
	authors\author,
	authors\author\name\any as name,
	authors\author\email\any as email,
	authors\author\homepage\any as homepage,
	authors\author\role\any as role,
	depedency\atoum,
	required,
	autoload,
	autoload\classmap,
	autoload\psr4\any as psr4,
	autoload\psr4\mapping,
	autoload\psr4\mapping\directory,
	autoload\psr4\mapping\fallback\directory as fallback,
	depedency\version\semver\number\any as number
};

use norsys\score\serializer\keyValue\{
	json,
	json\decorator\proxy,
	json\decorator\pretty
};

(
	new config(
		new norsys\score,
		new description('A fucking description.'),
		new project,
		new license\bsd\threeClause,
		new authors(
			new author\mageekguy,
			new author\any(
				new name('John Doe'), new email('john@doe.name'), new homepage('http://john.doe.name'), new role('Translator')
			)
		),
		new required\prod(
			new atoum\dev,
			new atoum(
				new version\dev\any(new branch('a_branch'))
			),
			new atoum(
				new version\disjunction(
					new version\greaterThan(new semver\major(new number(1))),
					new version\not(
						new semver\major\minor(new number(3), new number(6))
					),
					new version\lessThan\orEqualTo(
						new semver\major\minor(new number(4), new number(2))
					)
				)
			)
		),
		new required\dev(
			new atoum\dev
		),
		new autoload\prod(
			new psr4(
				new mapping\norsys\score,
				new fallback(
					new directory\src
				)
			),
			new classmap\any(
				new classmap\filename\directory(
					new filename('lib')
				)
			)
		),
		new autoload\dev(
			new psr4(
				new mapping\norsys\score,
				new fallback(
					new directory\src
				)
			)
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
