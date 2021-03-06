Composer - Package Management for PHP
=====================================

Composer is a package manager tracking local dependencies of your projects and libraries.

See the [about page](http://packagist.org/about) on [packagist.org](http://packagist.org/) for more information.

Installation / Usage
--------------------

1. Download the [`composer.phar`](http://getcomposer.org/composer.phar) executable
2. Create a composer.json defining your dependencies. Note that this example is
a short version for applications that are not meant to be published as packages
themselves. To create libraries/packages please read the [guidelines](http://packagist.org/about).

    ``` json
    {
        "require": {
            "monolog/monolog": ">=1.0.0"
        }
    }
    ```

3. Run Composer: `php composer.phar install`
4. Browse for more packages on [Packagist](http://packagist.org).

Contributing
------------

All code contributions - including those of people having commit access -
must go through a pull request and approved by a core developer before being
merged. This is to ensure proper review of all the code.

Fork the project, create a feature branch, and send us a pull request.

Requirements
------------

PHP 5.3+

Authors
-------

Nils Adermann - <naderman@naderman.de> - <http://twitter.com/naderman> - <http://www.naderman.de><br />
Jordi Boggiano - <j.boggiano@seld.be> - <http://twitter.com/seldaek> - <http://seld.be><br />

See also the list of [contributors](https://github.com/composer/composer/contributors) who participated in this project.

License
-------

Composer is licensed under the MIT License - see the LICENSE file for details

Acknowledgments
---------------

This project's Solver started out as a PHP port of openSUSE's [Libzypp satsolver](http://en.opensuse.org/openSUSE:Libzypp_satsolver).
