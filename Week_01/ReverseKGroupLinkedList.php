<?php
/**
 * 25. 每k个一组翻转链表
 */

class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}


class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $pre = $dummy;
        $end = $dummy;

        while ($end->next) {
            for ($i=0; $i<$k && $end; $i++) {
                $end = $end->next;
            }
            if (!$end) break;

            $start = $pre->next;
            $next = $end->next;
            $end->next = null;

            $pre->next = $this->reverse($start);

            $start->next = $next;

            $pre = $start;
            $end = $pre;
        }
        return $dummy->next;
    }

    function reverse(ListNode $head) {
        $cur = $head;
        $pre = null;

        while($cur) {
            $temp = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $temp;
        }

        return $pre;
    }

    function printList($node) {
        $tmp = [];
        while ($node){
            $tmp[] = $node->val;
            $node = $node->next;
        }
        echo "[",implode(',',$tmp),"]\n";
    }
}

$list = new ListNode(0);
$pre = $list;
for ($i=1; $i<=5; $i++) {
    $tmp = new ListNode($i);
    $pre->next = $tmp;
    $pre = $pre->next;
}

$k = 3;
$obj = new Solution();
//$obj->printList($list->next);
//exit;

$rs = $obj->reverseKGroup($list->next,$k);
$obj->printList($rs);