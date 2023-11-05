<?php

namespace PxlFarm\SortedLinkedList;

class DataNode
{
    public function __construct(public $value, public ?DataNode $next = null) { }
}