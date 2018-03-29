<?php

declare(strict_types=1);

namespace Esemve\Collection;

use Esemve\Collection\Exception\InvalidTypeException;
use Esemve\Collection\Exception\NotSupportedException;
use Tightenco\Collect\Support\Collection as BaseCollection;

abstract class AbstractTypedCollection extends BaseCollection
{
    public function __construct(array $array = [])
    {
        $this->validateValues($array);
        parent::__construct($array);
    }

    /**
     * Validate an element in array.
     * @param $element
     * @return bool
     */
    abstract protected function isValid($element): bool;

    public function push($value)
    {
        $this->validateValue($value);

        return parent::push($value);
    }

    public function put($key, $value)
    {
        $this->validateValue($value);

        return parent::put($key, $value);
    }

    public function map(callable $callback)
    {
        $keys = array_keys($this->items);

        $items = array_map($callback, $this->items, $keys);

        try {
            foreach ($items AS $item) {
                if ($this->isValid($item) === false) {
                    throw new \Exception();
                }
            }
            return new static(array_combine($keys, $items));
        }
        catch (\Exception $e) {
            return new Collection(array_combine($keys, $items));
        }
    }

    public function offsetSet($key, $value)
    {
        $this->validateValue($value);

        parent::offsetSet($key, $value);
    }

    public function merge($items)
    {
        $this->validateValues($items);

        return parent::merge($items);
    }

    public function keys()
    {
        $arrayKeys = array_keys($this->items);
        foreach ($arrayKeys AS $position => $key)
        {
            $arrayKeys[$position] = (string) $key;
        }

        return new StringCollection($arrayKeys);
    }

    /**
     * @param mixed $items
     * @throws NotSupportedException
     * @deprecated
     */
    public function combine($items)
    {
        throw new NotSupportedException(
            'Typed collections not supported the combine method!'
        );
    }

    public function union($items)
    {
        $this->validateValues($items);

        return parent::union($items);
    }

    public function prepend($value, $key = null)
    {
        $this->validateValue($value);

        return parent::prepend($value, $key);
    }

    protected function validateValues(array $array): void
    {
        foreach ($array as $value) {
            $this->validateValue($value);
        }
    }

    protected function validateValue($value): void
    {
        if (!$this->isValid($value)) {
            $message = $this->getErrorMessage();

            if ($message === null) {
                $errorType = gettype($value);

                if ($errorType==='object') {
                    $errorType = get_class($value);
                }

                $message = sprintf(
                    "%s not valid type in %s collection!",
                    $errorType,
                    get_called_class()
                );
            }

            throw new InvalidTypeException(
                $message
            );
        }
    }

    protected function getErrorMessage(): ?string
    {
        return null;
    }
}
