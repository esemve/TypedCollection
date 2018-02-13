<?php

declare(strict_types=1);

namespace Esemve\Collection;

class NullCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_null($element);
    }
}
