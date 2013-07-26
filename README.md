#PHP-GAG

Simple PHP port for the [Google Annotations Gallery](https://code.google.com/p/gag/)

[![Build Status](https://secure.travis-ci.org/kpacha/php-gag.png?branch=master)](https://travis-ci.org/kpacha/php-gag) [![Coverage Status](https://coveralls.io/repos/kpacha/php-gag/badge.png?branch=master)](https://coveralls.io/r/kpacha/php-gag?branch=master)

The PHP-GAG is an open source library that provides a rich set of annotations for
developers to express themselves. Do you find the standard phpDoc annotations dry
and lackluster? Have you ever resorted to leaving messages to fellow developers
with the @deprecated annotation? Wouldn't you rather leave a @LOL or @Facepalm
instead? If so, then this is the gallery for you.

Not only can you leave expressive remarks in your code, you can use these
annotations to draw attention to your poetic endeavors. How many times have you
written a palindromic or synecdochal line of code and wished you could annotate
it for future readers to admire? Look no further than @Palindrome and @Synecdoche.

But wait, there's more. The PHP-GAG comes with an AOP package and, just by using
one or several of the PHP-GAG aspects, you can have your annotations behavior-enforced
at runtime. For example, if you want to ensure that a method parameter is non-zero,
try @ThisHadBetterNotBe(ThisHadBetterBe::ZERO). Want to completely inhibit a method's
implementation? Try @Noop.

If we've whet your appetite for truly expressive annotations, then read on and
immerse yourself in the PHP-GAG.

### Currently Available Annotations

* @AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything : Causes the annnotated numeric parameter/property to evaluate to the Answer to the Ultimate Question of Life, the Universe and Everything.
* @CantTouchThis : Replaces the implementation of the annotated method to instead print "Stop" along with the specified reason to standard out.
* @ImaLetYouFinishBut : Causes the annotated method to first execute the parameterless method indicated by the annotation's value attribute
* @Noop : Causes the annotated method (or all the methods of the annotated class - TODO) to become noop.
* @Roulette : Causes the annotated method to throw the indicated throwable with the specified probability.
* @ThisHadBetterBe : Enforces that the annotated parameter/property has the specified property.
* @ThisHadBetterNotBe : Enforces that the annotated parameter/property does not have the specified property.

## Installation

### Standalone installation

At the moment of writing this documentation the code is only aviable by cloning it directly from github.

Clone the repo

    git clone git@github.com:kpacha/php-gag.git
    cd php-gag
    php composer.phar install

Run the tests to see if everything is ok

    phpunit

Also, there a couple of demo scripts inside the _examples/_ folder. You could run them as

    cd examples
    php filter.php
    php aop.php

### Installing as library

Include the library in your project

- Add composer dependency

        "require": {
            "kpacha/php-gag": "dev-master"
        },
        "repositories": [
            {"type": "vcs", "url": "https://github.com/kpacha/php-gag"}
         ],

- Update dependencies

        php composer.phar update


## Usages

This library has 2 main packages designed to be used mixed or not. The filter package
allows you to filter/enforce the properties of any object and with the aspects package
you could enhace your services with a set of method lockups, replacements, parameter
inspectors and validators. Look at the _examples/_ and _tests/_ for more details.

## TODO

* Complete the annotations gallery
* Check the generated docs with the PHP-GAG annotations
* Create a code review tool based on the PHP-GAG annotations
* Publish the library at packagist


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/kpacha/php-gag/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

