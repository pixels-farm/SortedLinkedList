<?php

namespace PxlFarm\SortedLinkedList;

/**
 * Description of SortedLinkedList
 *
 * @author pxl
 */
class SortedLinkedList implements \Iterator {
    
    private ?DataNode $head = null;
    private ?DataNode $current = null;
    private int $length = 0;
    
    public function __construct() { }
    
    public function getLength(): int {
        return $this->length;
    }

    public function add(string|int $value): void {
        $Node = new DataNode($value);
        
        if ($this->head === null || $this->head->value >= $value) {
            $Node->next = $this->head;
            $this->head = $Node;
        } else {
            $pointer = $this->head;
            while ($pointer->next !== null && $pointer->next->value < $value) {
                $pointer = $pointer->next;
            }
            $Node->next = $pointer->next;
            $pointer->next = $Node;
        }
        $this->length += 1;
    }
    
    public function remove(string|int $value) {
        $current = $this->head;
        $prev = null;

        while ($current !== null) {
            if ($current->value === $value) {
                if ($prev !== null) {
                    $prev->next = $current->next;
                } else {
                    $this->head = $current->next;
                }
                unset($current);
                $this->length -= 1;
                return;
            }

            $prev = $current;
            $current = $current->next;
        }
    }
    
    private function search($value) {
        $left = $this->head;
        $right = null;

        while ($left !== $right) {
            $middle = $this->findMiddle($left, $right);

            if ($middle->value === $value) {
                return $middle;
            } elseif ($middle->value < $value) {
                $left = $middle->next;
            } else {
                $right = $middle;
            }
        }

        return null;
    }

    private function findMiddle($left, $right) {
        $slow = $left;
        $fast = $left;

        while ($fast !== $right && $fast->next !== $right) {
            $slow = $slow->next;
            $fast = $fast->next;
            $fast = $fast->next;
        }

        return $slow;
    }
    
    public function has(string|int $value): bool {
        return $this->search($value) !== null;
    }
    
    public function current(): mixed {
        return $this->current->value;
    }

    public function key(): mixed {
        return null;
    }

    public function next(): void {
        $this->current = $this->current->next;
    }

    public function rewind(): void {
        $this->current = $this->head;
    }

    public function valid(): bool {
        return $this->current !== null;
    }
}
