<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\StringCollection;

class StringCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return StringCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [['test1', 'test2', 'test3'],'test4'],
            [['xxx'], 'zzz']
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
            [function () {
            }],
            [[1,2,3]],
            [3.12]
        ];
    }
}
