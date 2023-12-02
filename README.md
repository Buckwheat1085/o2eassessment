# O2E Assessment

This is a simple demo module for the O2E technical assessment. The repo contains
an entire functional site (minus the database) but the module itself can be collected from
web/modules/custom/o2eassessment if preferred.

## How solution was developed

1. Generated a module with `lando drush generate:module`
2. Enabled the module with `lando drush en o2eassessment`
3. Generated two services with `lando drush generate service:custom`, passing the first (adder) service and string_translation service as dependencies for the second (string_formatter) service and creating interfaces for both
4. Populated the interfaces and classes with the appropriate methods then cleared the cache with `lando drush cr`
5. Tested the o2eassessment.string_formatter service with a bootstrapped Drupal environment using `lando drush php`
by invoking `\Drupal::service('o2eassessment.string_formatter')->sumAndFormatTwoNumbers(100, 125)`
6. Generated a controller with `lando drush generate controller`, injecting o2eassessment.string_formatter as a dependency
7. Populated the controller
8. Cleared the cache with `lando drush cr`
9. Tested the controller in the browser


## To test

This project can be run from the repo if you have [Lando](https://lando.dev/download/) setup by
simply cloning the repo, running `lando start`, and noting the domain.

Alternatively you can install it in an existing site or add suitable configuration to use in another
hosting setup.

To actually test the endpoint (assumes lando, adjust as appropriate for your setup):

1. Install dependencies with `lando composer install`
2. Install a site, e.g. by running `lando drush si -y standard`
3. Enable the module, e.g. with `lando drush en -y o2eassessment`
4. Visit the endpoint at your site URL with two numeric parameters, e.g. https://o2eassessment.lndo.site/o2eassessment/sum-two-numbers/100/125 with 100 and 125 being the two numbers to add
5. Verify the result is as expected

## Tools used

* Composer to create the project
* Lando to manage the environment (web host, database etc.)
* Drush to install the site and generate some boilerplate code (initial module, empty services, controller)
* Visual Studio Code to edit (I usually use PHPStorm but I only have a licence from my work)
* phpcs and [coder](https://www.drupal.org/project/coder) to check compliance with Drupal standards


