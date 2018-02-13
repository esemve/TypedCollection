<?php

declare(strict_types=1);

namespace Esemve\Collection;

class ObjectCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_object($element);
    }
}
