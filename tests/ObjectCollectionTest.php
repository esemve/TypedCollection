<?php

declare(strict_types=1);

namespace Esemve\Tests\Collection;

use Esemve\Collection\ObjectCollection;

class ObjectCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return ObjectCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[new \stdClass()],new \stdClass()],
        ];
    }

    /**
     * Dataprovider for negative tests
     * @return array
     */
    public function exceptionDataProvider(): array
    {
        return [
            [1],
            ['hello','test'],
            [function () {
            }],
            [[1,2,3]],
            [3.12]
        ];
    }
}
