<?php
/**
 * 合并K个升序链表
 */

/**
 * @param $lists [][]
 */
function mergeKLists($lists) {
    $len = count($lists);
    if ($len == 0) return [];

    return merge($lists,0,$len-1);
}

function merge($lists,$left,$right) {
    if (empty($lists)) return [];
    if ($left == $right) {
        return $lists[$left];
    }

    $mid = ($left + $right) >> 1;

    $l1 = merge($lists,$left,$mid);
    $l2 = merge($lists,$mid+1,$right);

    return mergeTwoLists($l1,$l2);
}

function mergeTwoLists(ListNode $l1,ListNode $l2) {
    $l = new ListNode();
    $pre = $l;

    while ($l1 && $l2) {
        if ($l1->val <= $l2->val) {
            $pre->next = $l1;
            $l1 = $l1->next;
        }else{
            $pre->next = $l2;
            $l2 = $l2->next;
        }
        $pre = $pre->next;
    }

    $pre->next = $l1?:$l2;

    return $l->next;
}