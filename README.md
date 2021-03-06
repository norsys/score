# Score [![Build Status](https://travis-ci.org/norsys/score.svg?branch=master)](https://travis-ci.org/norsys/score) [![Coverage Status](https://coveralls.io/repos/github/norsys/score/badge.svg?branch=master)](https://coveralls.io/github/norsys/score?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/norsys/score/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/norsys/score/?branch=master)

`Score` allows a developper to create or maintain a PHP [composer](https://getcomposer.org)'s configuration file.

## About

This project is a work in progress, so the API can evolve rapidly and radicaly.  
Use it at your own risks!  
A demo is available in `./demo/composer/config.php`, to run it, just do `php ./demo/composer/config.php`.

## Contributing

### About workflow

We're using pull request to introduce new features and bug fixes.  
Please, try to be explicit in your commit messages:

1. Explain why the change was made ;
2. Explain technical implementation (you can provide links to any relevant tickets, articles or other resources).

You can use the following template:

```
# If applied, this commit will...

# Explain why this change is being made

# Provide links to any relevant tickets, articles or other resources
```

To use it, just put it in a text file in (for example) your home and define it as a template:

```
# git config --global commit.template ~/.git_commit_template.txt
```

### About testing

To run unit tests, just do `make unit-tests`.

## Languages and tools

- [*atoum*](http://docs.atoum.org).
