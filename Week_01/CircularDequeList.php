<?php
/**
 * https://leetcode-cn.com/problems/design-circular-deque/
 * 641: 实现双端循环队列
 * 双向链表实现循环队列
 */

class DListNode{
    public $val;
    public $pre;
    public $next;

    function __construct($val){
        $this->val = $val;
        $this->pre = null;
        $this->next = null;
    }
}
class MyCircularDequeList {
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    private $head;
    private $tail;
    private $length;
    private $capacity;
    function __construct($k) {
        $this->head = new DListNode('head');
        $this->tail = new DListNode('tail');
        $this->head->next = $this->tail;
        $this->tail->pre = $this->head;
        $this->length = 0;
        $this->capacity = $k;

    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->length == $this->capacity) return false;
        $node = new DListNode($value);
        $node->next = $this->head->next;
        $node->pre = $this->head;
        $this->head->next->pre = $node;
        $this->head->next = $node;
        $this->length++;
        $this->printDeque();
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->length == $this->capacity) return false;
        $node = new DListNode($value);
        $tail = $this->tail->pre;
        $tail->next = $node;
        $node->pre = $tail;
        $node->next = $this->tail;
        $this->tail->pre = $node;
        $this->length++;
        $this->printDeque();
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if($this->length == 0) return false;
        $node = $this->head->next->next;
        $node->pre = $this->head;
        $this->head->next = $node;
        $this->length--;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if($this->length == 0) return false;
        $node = $this->tail->pre->pre;
        $node->next = $this->tail;
        $this->tail->pre = $node;
        $this->length--;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if($this->length == 0) return -1;

        return $this->head->next->val;
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if($this->length == 0) return -1;

        return $this->tail->pre->val;
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->length == 0;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return $this->length == $this->capacity;
    }

    function printDeque(){
        $cur = $this->head;
        echo 'list: ';
        while($cur){
            echo $cur->val . ' -> ';
            $cur = $cur->next;
        }
        echo "\n";
    }
}

$res = [];
$obj = new MyCircularDequeList(3);
//$ret_1 = $obj->insertFront(0);
$res[] = $obj->insertLast(1);
$res[] = $obj->insertLast(2);
$res[] = $obj->insertFront(3);
$res[] = $obj->insertFront(4);
$res[] = $obj->insertFront(9);
$res[] = $obj->getRear();
$res[] = $obj->isFull();
////$res[] = $obj->deleteFront();
$res[] = $obj->deleteLast();
$res[] = $obj->insertFront(4);
$res[] = $obj->getFront();
$res[] = $obj->isEmpty();
$obj->printDeque();

echo "\n";
echo '['.implode(',',$res).']';
