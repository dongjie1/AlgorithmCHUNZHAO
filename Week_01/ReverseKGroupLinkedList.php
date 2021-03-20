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

        $pre = $dummy;//待翻转的前驱
        $end = $dummy;//待翻转的后驱

        while ($end->next) {
            for ($i=0; $i<$k && $end; $i++) {//先遍历k个节点
                $end = $end->next;
            }
            if (empty($end)) break;

            $start = $pre->next;//保存翻转前的开始的节点
            $next = $end->next; //保存k+1个节点用来和前面翻转的连接
            $end->next = null; //断开
            $pre->next = $this->reverse($start);//翻转k个

            $start->next = $next; //翻转后的和后面的连接上:因为翻转了,所以start在这里就是这次翻转的结尾了

            $pre = $start;  //重置,相当于本次翻转后的结尾
            $end = $pre;    //重置

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