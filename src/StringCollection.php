<?php

declare(strict_types=1);

namespace Esemve\Collection;

class StringCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_string($element);
    }
}
