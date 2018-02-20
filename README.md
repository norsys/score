# Score [![Build Status](https://travis-ci.org/norsys/score.svg?branch=master)](https://travis-ci.org/norsys/score)

`Score` allows a developper to create or maintain a PHP [composer](https://getcomposer.org)'s configuration file.

## About

This project is a work in progress, so the API can evolve rapidly and radicaly.
Use it at your own risks!

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

To run unit tests, just do `php tests/units/runner.php`.

## Languages and tools

- [*atoum*](http://docs.atoum.org).
