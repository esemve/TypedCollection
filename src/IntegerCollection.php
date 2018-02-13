<?php

declare(strict_types=1);

namespace Esemve\Collection;

class IntegerCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_integer($element);
    }
}
