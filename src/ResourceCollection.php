<?php

declare(strict_types=1);

namespace Esemve\Collection;

class ResourceCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return is_resource($element);
    }
}
