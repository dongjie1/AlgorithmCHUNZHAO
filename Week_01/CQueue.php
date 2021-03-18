<?php
/**
 * [剑指 Offer 09] 用两个栈实现一个队列。
 * 队列的声明如下，请实现它的两个函数 appendTail 和 deleteHead ，分别完成在队列尾部插入整数和在队列头部删除整数的
    功能。(若队列中没有元素，deleteHead 操作返回 -1 )
 */

class CQueue {
    private $stack1;//
    private $stack2;
    function __construct() {
        $this->stack1 = [];
        $this->stack2 = [];
    }

    function appendTail($value) {
        $this->stack1[] = $value;
    }

    function deleteHead() {
        if (empty($this->stack2)) {
            while ($this->stack1) {
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        if (empty($this->stack2)) {
            return -1;
        }

        $head = array_pop($this->stack2);
        return $head;
    }
}