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

class BlacklistedEmailTest extends \PHPUnit_Framework_TestCase
{
    public function testMessage()
    {
        $constraint = $this->getConstraint();

        $this->assertEquals('The email host "%host%" is blacklisted. Please use another one!',
            $constraint->message);
    }

    public function testValidateBy()
    {
        $constraint = $this->getConstraint();

        $this->assertEquals('blacklisted_email_validator', $constraint->validatedBy());
    }

    /**
     * @return BlacklistedEmail
     */
    private function getConstraint()
    {
        $constraint = new BlacklistedEmail();

        return $constraint;
    }
}
