<?php

/**
 * 用数组实现双端队列
 * Class MyCircularDeque
 */
class MyCircularDeque {
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    private $deque = array();
    private $capacity;
    function __construct($k) {
        $this->capacity = $k;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if(empty($this->deque)){
            $this->deque[0] = $value;
            return true;
        }

        if(count($this->deque) == $this->capacity){
            return false;
        }

        array_unshift($this->deque,$value);
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if(empty($this->deque)){
            $this->deque[] = $value;
            return true;
        }

        if(count($this->deque) == $this->capacity){
            return false;
        }

        array_push($this->deque,$value);
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if(empty($this->deque)) return false;
        array_shift($this->deque);
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if(empty($this->deque)) return false;
        array_pop($this->deque);
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if(empty($this->deque)) return -1;
        return array_shift($this->deque);
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if(empty($this->deque)) return -1;
        return array_pop($this->deque);
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
        return count($this->deque) == $this->capacity;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */