<?php

# To execute this file, just do `php -f path/to/this/file`.

namespace norsys\score\demo\config\writer\depedencies\depedency;

require __DIR__ . '/../../vendor/autoload.php';

use norsys\score\{ php, php\string\recipient\stdout };
use norsys\score\vcs\branch\any as branch;

use norsys\score\composer\{
	root\any as root,
	fs\path\any as path,
	fs\path\filename\any as filename,
	fs\path\file,
	fs\path\directory,
	fs\path\symfony,
	config\any as config,
	config\platform,
	depedency\version,
	depedency\version\semver,
	name\norsys,
	type\project,
	license,
	description\any as description,
	authors\any as authors,
	authors\author,
	authors\author\name\human as name,
	authors\author\email\any as email,
	authors\author\homepage\any as homepage,
	authors\author\role\any as role,
	depedency\atoum,
	required,
	autoload,
	autoload\classmap,
	autoload\psr4\any as psr4,
	autoload\psr4\mapping,
	autoload\psr4\mapping\fallback\directory as fallback,
	depedency\version\semver\number\any as number
};

use norsys\score\serializer\keyValue\{
	json,
	json\decorator\proxy,
	json\decorator\pretty
};

use norsys\score\{ human, human\name\firstname\any as firstname, human\name\lastname\any as lastname };

(
	new root(
		new norsys\score,
		new description('A fucking description.'),
		new project,
		new license\bsd\threeClause,
		new authors(
			new author\mageekguy,
			new author\any(
				new name(
					new human\name\firstname\lastname(
						new firstname('John'),
						new lastname('Doe')
					)
				),
				new email('john@doe.name'),
				new homepage('http://john.doe.name'),
				new role('Translator')
			)
		),
		new config(
			new platform\any(
				new platform\php(
					new php\version\major\minor\release(
						new php\version\number\any(7),
						new php\version\number\any(2),
						new php\version\number\any(6)
					)
				)
			)
		),
		new required\prod(
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
				new directory(new filename('lib')),
				new file(new filename('Something.php')),
				new symfony\app
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
