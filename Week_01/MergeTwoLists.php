<?php
/**
 * https://leetcode-cn.com/problems/merge-two-sorted-lists/
 * 21: 合并两个有序链表
 */

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     * 时间复杂度: O(n+m)
     * 空间复杂度: O(1)
     */
    function mergeTwoLists($l1, $l2)
    {
        $l = new ListNode(-1);
        $pre = $l;
        while ($l1 != null && $l2 != null) {
            if ($l1->val <= $l2->val) {
                $pre->next = $l1;
                $l1 = $l1->next;
            } else {
                $pre->next = $l2;
                $l2 = $l2->next;
            }
            $pre = $pre->next;
        }

        $pre->next = $l1 != null ? $l1 : $l2;

        return $l->next;
    }

    /**
     * @param $l1
     * @param $l2
     * @return mixed
     * 递归
     * 时间复杂度: O(n+m)
     * 空间复杂度: O(n+m)
     */
    function mergeTwoLists2($l1,$l2){
        if($l1 == null){
            return $l2;
        }elseif($l2 == null){
            return $l1;
        }elseif($l1->val <= $l2->val){
            $l1->next =  $this->mergeTwoLists($l1->next,$l2);
            return $l1;
        }else{
            $l2->next =  $this->mergeTwoLists($l1,$l2->next);
            return $l2;
        }

    }
}
