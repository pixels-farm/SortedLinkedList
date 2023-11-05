<?php

namespace PxlFarm\SortedLinkedList;

/**
 * Description of SortedLinkedNumbersList
 * @author Volodymyr Kovalchuk <pxl@pixels.farm>
 */
class SortedLinkedNumbersList extends SortedLinkedList {
    public function add(string|int $value): void {
        if(gettype($value) !== 'integer') {
            $SortedLinkedStringsList = SortedLinkedStringsList::class;
            $SortedLinkedList = SortedLinkedList::class;
            throw new \Exception(printf("Unsupported type. Use %s for strings only or %s for mixed types", $SortedLinkedStringsList, $SortedLinkedList));
        }
        parent::add($value);
    }
}
