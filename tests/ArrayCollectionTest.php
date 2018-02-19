<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\ArrayCollection;

class ArrayCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return ArrayCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[[1], ['string']], [3.2]],
            [[['b']], ['a']]
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
            [4.3],
            ['test','info']
        ];
    }
}