<?php

namespace Linio\Component\Input\Instantiator;

use Linio\Component\Input\TestUser;

class ReflectionInstantiatorTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCreatingInstances()
    {
        $instantiator = new ReflectionInstantiator();
        $instance = $instantiator->instantiate(TestUser::class, ['name' => 'foobar', 'age' => 20, 'is_active' => true]);

        $this->assertInstanceOf(TestUser::class, $instance);
        $this->assertEquals('foobar', $instance->getName());
        $this->assertEquals(20, $instance->getAge());
        $this->assertEquals(true, $instance->isActive);
    }
}
