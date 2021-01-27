<?php

/**
 * N叉树后序遍历
 */
class Solution {
    /**
     * 递归
     * @param NTreeNode $root
     * @return integer[]
     */
    private $data = [];
    function postorder2($root) {
        if(!$root) return [];

        foreach($root->children as $child){
            $this->postorder($child);
        }
        $this->data[] = $root->val;
        return $this->data;
    }

    /**
     * 迭代
     * @param NTreeNode $root
     * @return array
     *
     */
    function postorder($root){
        if(!$root) return $this->data;

        $result = [];
        $stack = [$root];

        while (!empty($stack)){
            $node = array_pop($stack);
            $result[] = $node->val;

            foreach ($node->children as $child){
                if (!empty($child)){
                    $stack[] = $child;
                }
            }
        }

        $result = array_reverse($result);
        return $result;
    }
}