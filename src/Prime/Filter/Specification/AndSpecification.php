<?php

namespace Flasher\Prime\Filter\Specification;

use Flasher\Prime\Envelope;

final class AndSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface[]
     */
    private $specifications;

    /**
     * @param SpecificationInterface|SpecificationInterface[] $specifications
     */
    public function __construct($specifications)
    {
        $specifications = is_array($specifications) ? $specifications : func_get_args();

        $this->specifications = $specifications;
    }

    /**
     * @inheritDoc
     */
    public function isSatisfiedBy(Envelope $envelope)
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($envelope)) {
                return false;
            }
        }

        return true;
    }
}
