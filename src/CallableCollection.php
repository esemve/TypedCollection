<?php

declare(strict_types=1);

namespace Esemve\Collection;

class CallableCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_callable($element);
    }
}
