<?php

/**
 * 数组实现双端循环队列
 */
class MyCircularDequeArray {
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    private $deque = array();
    private $capacity;
    private $head = 0;
    private $tail = 0;
    function __construct($k) {
        $this->capacity = $k;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if($this->isEmpty()){
            $this->deque[0] = $value;
            $this->tail = 1;
            $this->head = 0;
            return true;
        }

        if($this->isFull()){
            return false;
        }

        $this->head = ($this->head - 1 + $this->capacity) % $this->capacity;
        $this->deque[$this->head] = $value;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if($this->isEmpty()){
            $this->deque[0] = $value;
            $this->tail = 1;
            $this->head = 0;
            return true;
        }

        if($this->isFull()){
            return false;
        }

        $this->deque[$this->tail] = $value;
        $this->tail = ($this->tail + 1) % $this->capacity;

        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if($this->isEmpty()) return false;
        unset($this->deque[$this->head]);
        $this->head = ($this->head + 1) % $this->capacity;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if($this->isEmpty()) return false;
        $index = ($this->tail - 1 + $this->capacity) % $this->capacity;
        unset($this->deque[$index]);
        $this->tail = ($index + $this->capacity) % $this->capacity;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if($this->isEmpty()) return -1;
        return $this->deque[$this->head];
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if($this->isEmpty()) return -1;
        $index = ($this->tail - 1 + $this->capacity) % $this->capacity;
        return $this->deque[$index];
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return count($this->deque) == 0;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return ($this->head == $this->tail) && (count($this->deque) == $this->capacity);
    }

    function printDeque(){
        echo implode(' -> ',$this->deque);
    }
}

$res = [];
$obj = new MyCircularDequeArray(2);
$res[] = $obj->insertFront(7);
$res[] = $obj->deleteLast();
$res[] = $obj->getFront();
$res[] = $obj->insertLast(5);
$res[] = $obj->insertFront(0);
$res[] = $obj->getFront();
$res[] = $obj->getRear();
$res[] = $obj->getFront();
$res[] = $obj->getFront();
$res[] = $obj->getRear();
$res[] = $obj->insertLast(0);

$obj->printDeque();

echo "\n";
echo '['.implode(',',$res).']';