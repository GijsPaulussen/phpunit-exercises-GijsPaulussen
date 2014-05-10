# Utexamples

These are code examples and exercises used in our training course "Quality Assurance". If interested in getting the training course don't hesitate to contact us for more details.

# Installation

The installation procedure is quite simple.

## Get the code examples

    $ git clone https://github.com/in2it/Utexamples.git

## Get the package manager Composer

    $ cd Utexamples/
    $ php -r "readfile('https://getcomposer.org/installer');" | php

## Install the required packages

    $ ./composer.phar install

This will install also PHPUnit and DBUnit, the tools we will be using during the training course. You'll find the `phpunit` executable in `./vendor/bin/phpunit`.

# Licence

This work is licensed under a [Creative Commons Attribution-ShareAlike 3.0 Unported License](LICENCE).
