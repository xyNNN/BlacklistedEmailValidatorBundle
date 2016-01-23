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
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;
use Xynnn\BlacklistedEmailValidatorBundle\Validator\Constraints\BlacklistedEmail;
use Xynnn\BlacklistedEmailValidatorBundle\Validator\Constraints\BlacklistedEmailValidator;

class BlacklistedEmailValidatorTest extends \PHPUnit_Framework_TestCase
{
    const VALID_MAIL_ADDRESS = 'valid@example.com';

    const BLACKLISTED_MAIL_ADDRESS = 'blacklisted@phpunit.de';

    public function testValid()
    {
        /**
         * @var BlacklistedEmailValidator $validator
         * @var BlacklistedEmail          $constraint
         */
        list($validator, $constraint) = $this->getValidator();

        $validator->validate(self::VALID_MAIL_ADDRESS, $constraint);
    }

    public function testBlacklisted()
    {
        /**
         * @var BlacklistedEmailValidator $validator
         * @var BlacklistedEmail          $constraint
         * @var \Mockery\Mock             $context
         */
        list($validator, $constraint, $context) = $this->getValidator();

        $context->shouldReceive('addViolation')
            ->with($constraint->message, ['%host%' => 'phpunit.de']);

        $validator->validate(self::BLACKLISTED_MAIL_ADDRESS, $constraint);
    }

    /**
     * @return array
     */
    private function getValidator()
    {
        $validator = new BlacklistedEmailValidator(false, ['phpunit.de']);
        $constraint = new BlacklistedEmail();

        /** @var \Mockery\Mock|ExecutionContextInterface $context */
        $context = \Mockery::mock(ExecutionContextInterface::class);
        $validator->initialize($context);

        return [$validator, $constraint, $context];
    }
}
