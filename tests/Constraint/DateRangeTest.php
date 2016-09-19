<?php

namespace Linio\Component\Input\Constraint;

class DateRangeTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCheckingInvalidData()
    {
        $constraint = new DateRange('today', '+3 days');
        $this->assertFalse($constraint->validate('yesterday'));
        $this->assertFalse($constraint->validate('+8 days'));
    }

    public function testIsCheckingValidData()
    {
        $constraint = new DateRange('today', '+3 days');
        $this->assertTrue($constraint->validate('today'));
        $this->assertTrue($constraint->validate('tomorrow'));
    }

    public function testIsGettingErrorMessage()
    {
        $constraint = new DateRange('today', '+3 days');
        $this->assertFalse($constraint->validate('yesterday'));
        $this->assertEquals('[field] Date is not between "today" and "+3 days"', $constraint->getErrorMessage('field'));
    }

    public function testErrorMessageIsCustomizable()
    {
        $constraint = new DateRange('today', '+3days', 'CUSTOM!');
        $this->assertSame('[field] CUSTOM!', $constraint->getErrorMessage('field'));
    }
}
