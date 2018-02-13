<?php

declare(strict_types=1);

namespace Esemve\Collection;

use Tightenco\Collect\Support\Collection;

class CollectionCollection extends AbstractTypedCollection
{
    protected function isValid($element): bool
    {
        return $element instanceof Collection;
    }
}
