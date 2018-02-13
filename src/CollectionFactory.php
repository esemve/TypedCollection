<?php

namespace Esemve\Collection;

use Tightenco\Collect\Support\Collection;

class CollectionFactory implements CollectionFactoryInterface
{
    public function createBooleanCollection(array $array): BooleanCollection
    {
        return new BooleanCollection($array);
    }

    public function createCallableCollection(array $array): CallableCollection
    {
        return new CallableCollection($array);
    }

    public function createClassCollection(string $classname, array $array): ClassCollection
    {
        return new ClassCollection($classname, $array);
    }

    public function createCollectionCollection(array $array): CollectionCollection
    {
        return new CollectionCollection($array);
    }

    public function createFloatCollection(array $array): FloatCollection
    {
        return new FloatCollection($array);
    }

    public function createIntegerCollection(array $array): IntegerCollection
    {
        return new IntegerCollection($array);
    }

    public function createNullCollection(array $array): NullCollection
    {
        return new NullCollection($array);
    }

    public function createObjectCollection(array $array): ObjectCollection
    {
        return new ObjectCollection($array);
    }

    public function createResourceCollection(array $array): ResourceCollection
    {
        return new ResourceCollection($array);
    }

    public function createStringCollection(array $array): StringCollection
    {
        return new StringCollection($array);
    }

    public function create(array $array): Collection
    {
        return new Collection($array);
    }
}
