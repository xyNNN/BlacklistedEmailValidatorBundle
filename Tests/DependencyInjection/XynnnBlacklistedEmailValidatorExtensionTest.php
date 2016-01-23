<?php
/*
 * This file is part of the BlacklistedEmailValidatorBundle project
 *
 * (c) Philipp Braeutigam <philipp.braeutigam@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xynnn\BlacklistedEmailValidatorBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Loader;
use Xynnn\BlacklistedEmailValidatorBundle\DependencyInjection\XynnnBlacklistedEmailValidatorExtension;

class XynnnBlacklistedEmailValidatorExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions()
    {
        return [
            new XynnnBlacklistedEmailValidatorExtension()
        ];
    }

    public function testLoad()
    {
        $this->load();

        $this->assertContainerBuilderHasService(
            'xynnn_blacklisted_email_validator.validator.blacklisted_email_validator',
            'Xynnn\BlacklistedEmailValidatorBundle\Validator\Constraints\BlacklistedEmailValidator'
        );
    }
}
