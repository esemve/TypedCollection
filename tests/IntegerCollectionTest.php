<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\IntegerCollection;

class IntegerCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return IntegerCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[1, 2, 3],4],
            [[1], 5]
        ];
    }

    /**
     * @return array
     */
    public function exceptionDataProvider(): array
    {
        return [
            ['1'],
            [new \stdClass()],
            [function () {
            }],
            [['info','notvalid']],
            [3.12]
        ];
    }
}
