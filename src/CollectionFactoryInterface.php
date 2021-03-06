<?php

namespace Esemve\Collection;

interface CollectionFactoryInterface
{
    public function createBooleanCollection(array $array): BooleanCollection;

    public function createCallableCollection(array $array): CallableCollection;

    public function createClassCollection(string $className, array $array): ClassCollection;

    public function createFloatCollection(array $array): FloatCollection;

    public function createIntegerCollection(array $array): IntegerCollection;

    public function createNullCollection(array $array): NullCollection;

    public function createObjectCollection(array $array): ObjectCollection;

    public function createResourceCollection(array $array): ResourceCollection;

    public function createStringCollection(array $array): StringCollection;

    public function createCollection(array $array): Collection;

    public function create(string $className, array $value);
}
