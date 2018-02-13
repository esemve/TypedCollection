<?php

declare(strict_types=1);

namespace Esemve\Collection;

class BooleanCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_bool($element);
    }
}
