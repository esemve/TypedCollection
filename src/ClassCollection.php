<?php

namespace Esemve\Collection;

class ClassCollection extends AbstractTypedCollection
{
    protected $validClassName = null;

    public function __construct(string $className, array $array)
    {
        $this->validClassName = $className;
        parent::__construct($array);
    }

    protected function isValid($element): bool
    {
        return is_a($element, $this->validClassName);
    }
}
