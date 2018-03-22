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
	composer\type\project,
	composer\license as license,
	composer\description\any as description,
	composer\authors\any as authors,
	composer\authors\author,
	composer\authors\author\name\any as name,
	composer\authors\author\email\any as email,
	composer\authors\author\homepage\any as homepage,
	composer\authors\author\role\any as role,
	composer\depedency\atoum,
	composer\required\prod as require_prod,
	composer\autoload\psr4\any as psr4,
	composer\autoload\psr4\mapping\any as mapping,
	composer\autoload\psr4\mapping\directory\any as directory,
	composer\autoload\psr4\mapping\prefix\official as prefix,
	composer\autoload\psr4\mapping\fallback\directory as fallback,
	composer\required\dev as require_dev,
	composer\depedency\version\semver\number\any as number,
	php\label\any as label,
	fs\path\filename\ext4NtfsHfsPlus as filename,
	vcs\branch\any as branch,
	serializer\keyValue\json,
	serializer\keyValue\json\decorator\proxy,
	serializer\keyValue\json\decorator\pretty
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
		new require_prod(
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
		new require_dev(
			new atoum\dev
		),
		new psr4(
			new mapping(
				new prefix(new label('norsys'), new label('score')),
				new directory(new filename('src'))
			),
			new fallback(
				new directory(new filename('src'))
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
