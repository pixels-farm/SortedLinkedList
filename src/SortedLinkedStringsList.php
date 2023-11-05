<?php

namespace PxlFarm\SortedLinkedList;

/**
 * Description of SortedLinkedStringsList
 *
 * @author Volodymyr Kovalchuk <pxl@pixels.farm>
 */
class SortedLinkedStringsList extends SortedLinkedList {
    public function add(string|int $value): void {
        if(gettype($value) !== 'string') {
            $SortedLinkedNumbersList = SortedLinkedNumbersList::class;
            $SortedLinkedList = SortedLinkedList::class;
            throw new \Exception(printf("Unsupported type. Use %s for integers only or %s for mixed types", $SortedLinkedNumbersList, $SortedLinkedList));
        }
        parent::add($value);
    }
}
