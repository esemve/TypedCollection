<?php

declare(strict_types=1);

namespace Esemve\Collection;

use Esemve\Collection\Exception\InvalidTypeException;
use Esemve\Collection\Exception\NotSupportedException;
use Tightenco\Collect\Support\Collection;

abstract class AbstractTypedCollection extends Collection
{
    public function __construct(array $array = [])
    {
        $this->validateValues($array);
        parent::__construct($array);
    }

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
