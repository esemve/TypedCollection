<?php

declare(strict_types=1);

namespace Esemve\Collection;

class ClassCollection extends AbstractTypedCollection
{
    protected $validClassName = null;

    public function __construct(string $validClassName, array $array)
    {
        $this->validClassName = $validClassName;
        parent::__construct($array);
    }

    public function getValidClassName(): ?string
    {
        return $this->validClassName;
    }

    protected function isValid($element): bool
    {
        return is_a($element, $this->validClassName);
    }
}
