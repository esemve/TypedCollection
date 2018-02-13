<?php

declare(strict_types=1);

namespace Esemve\Collection;

class FloatCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_float($element);
    }
}
