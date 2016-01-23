<?php
/*
 * This file is part of the BlacklistedEmailValidatorBundle project
 *
 * (c) Philipp Braeutigam <philipp.braeutigam@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xynnn\BlacklistedEmailValidatorBundle\Tests\Validator\Constraints;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Xynnn\BlacklistedEmailValidatorBundle\Validator\Constraints\BlacklistedEmail;
use Xynnn\BlacklistedEmailValidatorBundle\Validator\Constraints\BlacklistedEmailValidator;

class BlacklistedEmailValidatorTest extends \PHPUnit_Framework_TestCase
{
    const VALID_MAIL_ADDRESS = 'valid@example.com';

    const BLACKLISTED_MAIL_ADDRESS = 'blacklisted@trashmail.de';

    public function testValid()
    {
        /**
         * @var BlacklistedEmailValidator        $validator
         * @var BlacklistedEmail                 $constraint
         * @var \Mockery\Mock|ContainerInterface $container
         */
        list($validator, $constraint, , $container) = $this->getValidator();

        $container->shouldReceive('getParameter');

        $validator->validate(self::VALID_MAIL_ADDRESS, $constraint);
    }

    public function testBlacklisted()
    {
        /**
         * @var BlacklistedEmailValidator               $validator
         * @var BlacklistedEmail                        $constraint
         * @var \Mockery\Mock|ExecutionContextInterface $context
         * @var \Mockery\Mock|ContainerInterface        $container
         */
        list($validator, $constraint, $context, $container) = $this->getValidator();

        $container->shouldReceive('getParameter');

        $context->shouldReceive('buildViolation')
            ->with($constraint->message)
            ->andReturn($context);

        $context->shouldReceive('setParameter')
            ->with('%host%', 'trashmail.de')
            ->andReturn($context);

        $context->shouldReceive('addViolation');

        $validator->validate(self::BLACKLISTED_MAIL_ADDRESS, $constraint);
    }

    /**
     * @return array
     */
    private function getValidator()
    {
        /** @var \Mockery\Mock|ContainerInterface $container */
        $container = \Mockery::mock(ContainerInterface::class);

        $validator = new BlacklistedEmailValidator($container);
        $constraint = new BlacklistedEmail();

        /** @var \Mockery\Mock|ExecutionContextInterface $context */
        $context = \Mockery::mock(ExecutionContextInterface::class);
        $validator->initialize($context);

        return [$validator, $constraint, $context, $container];
    }
}
