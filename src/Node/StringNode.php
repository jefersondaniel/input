<?php

namespace Linio\Component\Input\Node;

use Linio\Component\Input\Constraint\Type;

class StringNode extends BaseNode
{
    public function __construct()
    {
        $this->addConstraint(new Type('string'));
    }
}
