<?php

namespace Esemve\Tests\Collection;

use Esemve\Collection\AbstractTypedCollection;
use PHPUnit\Framework\TestCase;

abstract class AbstractCollectionTestCase extends TestCase
{

    /**
     * Name of the tested Collection class
     * @return string
     */
    abstract protected function getClassName(): string;

    /**
     * Dataprovider for positive tests
     * @return array
     */
    abstract public function dataProvider(): array;

    /**
     * @return array
     */
    abstract public function exceptionDataProvider(): array;

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $pushArray
     */
    public function testOk(array $testArray, $pushArray): void
    {
        $collection = $this->createCollection($testArray);
        $collection->push($pushArray);

        $testArray[] = $pushArray;

        $this->assertEquals(
            $testArray,
            $collection->values()->all()
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $unionValue
     */
    public function testUnion(array $testArray, $unionValue): void
    {
        $collection = $this->createCollection($testArray);

        $this->assertEquals(
            $testArray,
            $collection->union([$unionValue])->all()
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $mergeValue
     */
    public function testMerge(array $testArray, $mergeValue): void
    {
        $collection = $this->createCollection($testArray);

        $testArray[] = $mergeValue;

        $this->assertEquals(
            $testArray,
            array_values($collection->merge([$mergeValue])->all())
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $prependValue
     */
    public function testPrepend(array $testArray, $prependValue): void
    {
        $collection = $this->createCollection($testArray);

        array_unshift($testArray, $prependValue);

        $this->assertEquals(
            $testArray,
            $collection->prepend($prependValue)->all()
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $putValue
     */
    public function testPut(array $testArray, $putValue): void
    {
        $collection = $this->createCollection($testArray);

        $testArray[1] = $putValue;

        $this->assertEquals(
            $testArray,
            $collection->put(1, $putValue)->all()
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $testArray
     * @param $putValue
     */
    public function testOffsetSet(array $testArray, $putValue): void
    {
        $collection = $this->createCollection($testArray);

        $testArray[1] = $putValue;

        $collection->offsetSet(1, $putValue);

        $this->assertEquals(
            $testArray,
            $collection->all()
        );
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\InvalidTypeException
     */
    public function testPushThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->push($item);
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\InvalidTypeException
     */
    public function testUnionThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->union([$item]);
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\InvalidTypeException
     */
    public function testMergeThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->merge([$item]);
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\InvalidTypeException
     */
    public function testPrependThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->prepend($item);
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\InvalidTypeException
     */
    public function testOffsetSetThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->offsetSet(1, $item);
    }

    /**
     * @dataProvider exceptionDataProvider
     * @expectedException \Esemve\Collection\Exception\NotSupportedException
     */
    public function testCombineThrowException($item): void
    {
        $collection = $this->createEmptyCollection();
        $collection->combine([$item]);
    }


    protected function createCollection(array $content): AbstractTypedCollection
    {
        /**
         * @var AbstractTypedCollection $collection
         */
        $className = $this->getClassName();
        $collection = new $className($content);

        return $collection;
    }

    protected function createEmptyCollection(): AbstractTypedCollection
    {
        $className = $this->getClassName();
        return new $className();
    }

}