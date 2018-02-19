<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\CallableCollection;

class CallableCollectionTest extends AbstractCollectionTestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    protected function getClassName(): string
    {
        return CallableCollection::class;
    }

    /**
     * Dataprovider for positive tests
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [[function () {
            }, function () {
            }], function () {
            }],
            [[function () {
            }], function () {
            }]
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
            [3.4],
            [[1,2,3]],
            ['test','info']
        ];
    }
}
