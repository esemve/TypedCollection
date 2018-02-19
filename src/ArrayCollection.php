<?php

declare(strict_types=1);

namespace Esemve\Collection;

class ArrayCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_array($element);
    }
}
