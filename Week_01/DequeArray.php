<?php

/**
 * https://leetcode-cn.com/problems/design-circular-deque/
 * 641: 实现双端循环队列
 * 用数组实现双端队列
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
        if($this->isEmpty()){
            $this->deque[0] = $value;
            return true;
        }

        if($this->isFull()){
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
        if($this->isEmpty()){
            $this->deque[] = $value;
            return true;
        }

        if($this->isFull()){
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
        if($this->isEmpty()) return false;
        array_shift($this->deque);
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if($this->isEmpty()) return false;
        array_pop($this->deque);
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if($this->isEmpty()) return -1;
        return array_shift($this->deque);
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if($this->isEmpty()) return -1;
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
 * $obj = MyCircularDeque(3);
 * $ret_1 = $obj->insertFront(1);
 * $ret_2 = $obj->insertLast(2);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */