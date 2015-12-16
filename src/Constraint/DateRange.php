<?php
declare(strict_types=1);

namespace Linio\Component\Input\Constraint;

class DateRange extends Constraint
{
    /**
     * @var string
     */
    protected $min;

    /**
     * @var string
     */
    protected $max;

    public function __construct(string $min, string $max)
    {
        $this->min = $min;
        $this->max = $max;
        $this->errorMessage = sprintf('Date is not between "%s" and "%s"', $this->min, $this->max);
    }

    public function validate($content): bool
    {
        $date = new \DateTime($content);

        return $date >= new \DateTime($this->min) && $date <= new \DateTime($this->max);
    }
}