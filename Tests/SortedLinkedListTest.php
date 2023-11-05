<?php

namespace PxlFarm\SortedLinkedList\Tests;

use PxlFarm\SortedLinkedList\SortedLinkedList;
use PxlFarm\SortedLinkedList\SortedLinkedNumbersList;
use PxlFarm\SortedLinkedList\SortedLinkedStringsList;
use PHPUnit\Framework\TestCase;

/**
 * Tests the SortedLinkedList.
 *
 * @author Volodymyr Kovalchuk <pxl@pixels.farm>
 *
 * @group legacy
 */
class SortedLinkedListTest extends TestCase
{
    /**
     * Tests SortedLinkedList is iterable
     */
    public function testListIsIterable()
    {
        $list = new SortedLinkedList();
        $this->assertIsIterable($list);
    }
    
    /**
     * Tests calling SortedLinkedList::add()
     */
    public function testAddFunction()
    {
        $list = new SortedLinkedList();
        $list->add('some value');
        
        $this->assertCount(1, $list);
    }

    /**
     * Tests calling SortedLinkedList::remove()
     */
    public function testRemoveFunction()
    {
        $list = new SortedLinkedList();
        $list->add('some value');
        
        $this->assertCount(1, $list);
        $list->remove('some value');
        
        $this->assertCount(0, $list);
    }

    /**
     * Tests calling SortedLinkedList::has()
     */
    public function testHasFunction()
    {
        $list = new SortedLinkedList();
        $list->add('some value');
        $list->add('some value 2');
        $list->add('some value 3');
        
        $this->assertTrue($list->has('some value 2'));
    }
    
    /**
     * Tests SortedLinkedList is sorted
     */
    public function testIsSorted()
    {
        $list = new SortedLinkedList();
        $list->add('cow');
        $list->add('dog');
        $list->add('agawa');
        
        $concat = '';
        foreach ($list as $word) $concat .= $word;
        
        $this->assertStringContainsString('agawacowdog', $concat);
    }
    
    /**
     * Tests SortedLinkedList throws \Exception on adding a value with a wrong type
     */
    public function testThrowingExceptionOnAddStringToIntegersList() {
        $list = new SortedLinkedNumbersList();
        $this->expectException(\Exception::class);
        $list->add('some string');
    }
    
    /**
     * Tests SortedLinkedList throws \Exception on adding a value with a wrong type
     */
    public function testThrowingExceptionOnAddIntegerToStringsList() {
        $list = new SortedLinkedStringsList();
        $this->expectException(\Exception::class);
        $list->add(123);
    }
}
