<?php

declare(strict_types=1);

namespace Esemve\Collection;

use Tightenco\Collect\Support\Collection;

class CollectionFactory implements CollectionFactoryInterface
{
    /**
     * @var array
     */
    private $remap;

    public function __construct(array $remap = [])
    {
        $this->remap = $remap;
    }

    public function createBooleanCollection(array $array): BooleanCollection
    {
        return new BooleanCollection($array);
    }

    public function createCallableCollection(array $array): CallableCollection
    {
        return new CallableCollection($array);
    }

    public function createClassCollection(string $className, array $array): ClassCollection
    {
        return new ClassCollection($className, $array);
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

    public function createCollection(array $array): Collection
    {
        return new Collection($array);
    }

    public function create(string $className, array $value): Collection
    {
        if (!empty($this->remap[$className])) {
            $className = $this->remap[$className];
        }
        return new $className($value);
    }
}
