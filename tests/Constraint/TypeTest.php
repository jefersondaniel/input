<?php

namespace Linio\Component\Input\Constraint;

class TypeTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCheckingInvalidData()
    {
        $constraint = new Type('int');
        $this->assertFalse($constraint->validate('test'));
        $this->assertFalse($constraint->validate('2'));
    }

    public function testIsCheckingValidData()
    {
        $constraint = new Type('int');
        $this->assertTrue($constraint->validate(2));
        $this->assertTrue($constraint->validate(123));
    }

    public function testIsGettingErrorMessage()
    {
        $constraint = new Type('int');
        $this->assertFalse($constraint->validate('test'));
        $this->assertEquals('[field] Value does not match type: int', $constraint->getErrorMessage('field'));
    }

    public function testErrorMessageIsCustomizable()
    {
        $constraint = new Type('int', 'CUSTOM!');
        $this->assertSame('[field] CUSTOM!', $constraint->getErrorMessage('field'));
    }
}
