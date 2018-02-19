<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\FloatCollection;

class FloatCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return FloatCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[1.2, 3.14, 7.77 ], 5.32],
            [[0.0], 3.4]
        ];
    }

    /**
     * @return array
     */
    public function exceptionDataProvider(): array
    {
        return [
            [1],
            [new \stdClass()],
            [function() {}],
            [[1,2,3]],
            ['test','info']
        ];
    }
}