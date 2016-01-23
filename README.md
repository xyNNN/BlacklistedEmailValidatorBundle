# BlacklistedEmailValidatorBundle

[![Software License](https://img.shields.io/badge/license-LGPL%203.0-brightgreen.svg?style=flat-square)](LICENSE)

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

Add the required configuration to ```app/config/config.yml```

    xynnn_blacklisted_email_validator:
          hosts: ~
## Usage

Add the new registered Constraint to your models or get it from the service container as a standalone service like every time. For more information about the Symfony validation package please look at [The Symfony Book](http://symfony.com/doc/current/book/validation.html).

Normally without to adjust the configuration it will blacklist the hostnames which are defined in the ```XynnnBlacklistedEmailValidatorExtension```. You can override this defaults with the provided configuration ability.

    xynnn_blacklisted_email_validator:
          hosts: ["domain1.com", "domain2.com"]

## Authors

**Philipp Bräutigam**

+ [github/xyNNN](https://github.com/xyNNN)
+ [twitter/pbraeutigam](http://twitter.com/pbraeutigam)

## License
Copyright (c) 2015 Philipp Bräutigam  
This repository is released under the GNU LGPL v3.0 license.
