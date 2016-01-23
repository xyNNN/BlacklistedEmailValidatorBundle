# BlacklistedEmailValidatorBundle

[![Code Coverage](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xyNNN/BlacklistedEmailValidatorBundle/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/xynnn/blacklisted-email-validator-bundle/v/stable)](https://packagist.org/packages/xynnn/blacklisted-email-validator-bundle) [![Total Downloads](https://poser.pugx.org/xynnn/blacklisted-email-validator-bundle/downloads)](https://packagist.org/packages/xynnn/blacklisted-email-validator-bundle) [![Latest Unstable Version](https://poser.pugx.org/xynnn/blacklisted-email-validator-bundle/v/unstable)](https://packagist.org/packages/xynnn/blacklisted-email-validator-bundle) [![License](https://poser.pugx.org/xynnn/blacklisted-email-validator-bundle/license)](https://packagist.org/packages/xynnn/blacklisted-email-validator-bundle)

An extended email address validator which validates against blacklisted hostnames for Symfony 2. It's designed for easy usage! Install it in a Symfony project or also use it as framework-agnostic library.

## Requirements

- [x] PHP 5.6 and higher
- [x] Symfony 2.7 and higher

## Installation

Install this bundle with composer:

    composer require xynnn/blacklisted-email-validator-bundle

Register the bundle in ```app/AppKernel.php```

    public function registerBundles()
    {
      $bundles = [
        // ...
        new Xynnn\BlacklistedEmailValidatorBundle\XynnnBlacklistedEmailValidatorBundle(),
      ];
    }

## Usage

Add the new registered Constraint to your models or get it from the service container as a standalone service like every time. For more information about the Symfony validation package please look at [The Symfony Book](http://symfony.com/doc/current/book/validation.html).

Normally without to adjust the configuration it will blacklist the hostnames which are defined in the ```XynnnBlacklistedEmailValidatorExtension```. You can override these defaults with the provided configuration ability.

    xynnn_blacklisted_email_validator:
        strict: true // Enable strict mode for email validator
        hosts: ["domain1.com", "domain2.com"]

## Authors

**Philipp Bräutigam**

+ [github/xyNNN](https://github.com/xyNNN)
+ [twitter/pbraeutigam](http://twitter.com/pbraeutigam)

## License
Copyright (c) 2016 Philipp Bräutigam
This repository is released under the GNU LGPL v3.0 license.
