<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\BooleanCollection;

class BooleanCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return BooleanCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[true, true, true], true],
            [[true], true]
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